<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('user.auth.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        $user = User::create($registerRequest->validated())->assignRole(User::USER);
        auth()->login($user);
        return redirect(route('courses.index'));
    }
}
