<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function show()
    {
        session()->put('url.intended', url()->previous()) ;
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $request->only('email', 'password');
        $previousRoute = session()->pull('url.intended', '/') ;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect($previousRoute);
        }

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput(['email' => $credentials['email']]);

    }


    private function validateLogin($request)
    {
        $request->validate(['email'    => ['required', 'email'],
                            'password' => ['required', 'min:6', 'string']
                           ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
