<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    public function passwordReset(Request $request)
    {
        $request->validate(['token'    => 'required',
                            'email'    => ['required', 'email', 'exists:users,email'],
                            'password' => ['required', 'confirmed'],
                           ]);

        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

        $status = Password::reset($credentials,
            function ($user, $password) {
                $user->forceFill(['password' => $password])->save();
                $user->setRememberToken(Str::random(60));

            });

        return $status == Password::PASSWORD_RESET ? redirect()->route('login')->with('status', __($status)) :
            back()->withErrors(['email' => [__($status)]]);
    }

    public function show(Request $request)
    {
        return view('user.auth.reset_password', ['token' => $request->token, 'email' => $request->email]);
    }

    public function passwordResetForAuthUser(Request $request)
    {
        $request->validate(['old_password' => 'current_password',
                            'password'     => ['required', 'confirmed',]
                           ]);
        auth()->user()->update(['password' => $request->password]);
        return redirect()->route('login');
    }
}
