<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Speciality;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index( Request $request )
    {

        $filterData = $request->only(
            'type',
            'speciality',
            'title',
            'free',
            'with_cme',
            'past_events',
            'upcoming_events',
            'favorites',
            'my_speciality'
        );
        $courses    = Course::filter($filterData)
                            ->with('speakers', 'sponsors','organization')
                            ->get();

        if ( $request->ajax() )
            return view('user.courses.partials.courses-list', compact('courses'));

        $courseTypes  = CourseType::all();
        $specialities = Speciality::all();

        return view('user.courses.index', compact('courses', 'courseTypes', 'specialities'));
    }

    public function show()
    {

    }
}
