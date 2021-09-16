<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(EmailVerificationRequest $emailVerificationRequest)
    {
        $emailVerificationRequest->fulfill();

        return redirect('/');
    }

    public function resend()
    {
        if (auth()->user()->hasVerifiedEmail())
            return redirect('/')->withErrors(['message' => 'Already verified']);

        auth()->user()->sendEmailVerificationNotification();

        return redirect('/');
    }
}
