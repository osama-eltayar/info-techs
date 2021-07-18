<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => ['required','email','exists:users,email']]);
        $user = User::where('email',$request->email)->firstOrFail();

        $token = Password::createToken($user) ;
        $url = route('reset-password',['token' => $token,'email' => $user->email]) ;

        Mail::to($user->email)->send(new ForgetPasswordMail($url));

        return response([],Response::HTTP_NO_CONTENT);

    }

    public function show(Request $request)
    {
        return view('user.auth.forget_password',['token' => $request->token, 'email' => $request->email]) ;
    }
}
