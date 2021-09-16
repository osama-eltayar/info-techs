<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Payment\PaymentServiceInterface;
use App\Services\User\ShoppingCartService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function checkout(PaymentServiceInterface $paymentService,ShoppingCartService $shoppingCartService)
    {
        ['details' => $details] = $shoppingCartService->execute() ;

        $response = $paymentService->checkout(['amount' => $details->total]);

        if ($transactionId = Arr::get($response,'id'))
        {
            $shoppingCartService->pending($transactionId,$details->total);
            return view($paymentService->form(), compact('response'));
        }

        abort(400,Arr::get($response,'result.description'));
    }


    public function callback(PaymentServiceInterface $paymentService,ShoppingCartService $shoppingCartService)
    {
        $response = $paymentService->callback(request()->all());

        if (Arr::has($response, ['id', 'amount']))
        {
            ['details' => $details] =$shoppingCartService->execute() ;
            if (Arr::get($response,'amount') == $details->total )
            {
                $courseIds = $shoppingCartService->complete(Arr::get($response,'ndc'),Arr::get($response,'id'));
                Auth::user()->registeredCourses()->attach($courseIds);
            }
        }
        return redirect(route('courses.index'));
    }
}
