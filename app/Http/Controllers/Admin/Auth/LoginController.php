<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        session()->put('url.intended', url()->previous());
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $user          = User::admin()->where('email', $request->email)->first();
        $previousRoute = session()->pull('url.intended', '/');

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();
            Auth::login($user,$request->remember_me);
            return redirect($previousRoute);
        }

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput(['email' => $request->email]);

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
        return redirect(route('admin.login'));
    }
}
