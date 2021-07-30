<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\Speciality;
use App\Models\UserTitle;
use App\Services\User\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(ProfileRequest $profileRequest, ProfileService $profileService)
    {
        $profileService->execute($profileRequest->validated());

        return redirect(route('courses.index'));
    }

    public function edit()
    {
        $profile      = auth()->user()->profile ?? new Profile();
        $specialities = Speciality::all();
        $titles       = UserTitle::all();
        return view('user.profile.edit', compact('profile', 'titles', 'specialities'));
    }
}
