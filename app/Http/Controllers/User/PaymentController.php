<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function checkout()
    {

    }

    public function callback(Request $request)
    {

        //todo validate payment is succeeded
         Auth::user()->registeredCourses()->attach($request->course);
         return response([],Response::HTTP_NO_CONTENT);
    }
}
