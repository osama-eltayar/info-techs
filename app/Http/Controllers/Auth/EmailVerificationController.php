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
            abort(422);

        auth()->user()->sendEmailVerificationNotification();

        return response([],204);
    }
}
