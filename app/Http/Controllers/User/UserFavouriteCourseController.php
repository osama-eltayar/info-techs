<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavouriteCourseController extends Controller
{
    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @param Course                   $course
     * @return void
     */
    public function __invoke(Request $request,Course $course)
    {
        auth()->user()->favouriteCourses()->toggle($course->id);
        return response([],204) ;
    }
}
