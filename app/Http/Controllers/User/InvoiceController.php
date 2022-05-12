<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $filterData = $request->only(['from', 'to']);

        $invoices = ShoppingCart::forUser(Auth::id())
                             ->filter($filterData)
                             ->with('transaction','course')
                             ->whereNotNull('paid_at')
                             ->paginate(5);

        return view('user.invoices.index',compact('invoices'));
    }

    public function print($course)
    {
        $shoppingCart = ShoppingCart::query()
                                    ->forUser(Auth::id())
                                    ->where('course_id', $course)
                                    ->whereNotNull('paid_at')
                                    ->first();

        $pdf = \PDF::loadView('user.invoices.partials.invoice-template', compact('shoppingCart'));
        return $pdf->download('invoice.pdf');
    }
}
