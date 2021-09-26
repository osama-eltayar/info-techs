<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseSession;
use App\Services\User\Session\SessionServiceInterface;
use Illuminate\Support\Facades\Auth;

class CourseSessionController extends Controller
{
    public function show(CourseSession $courseSession,SessionServiceInterface $sessionService)
    {
        $this->authorize('view',$courseSession);
        $joinMeetingUrl = $sessionService->getJoinMeetingUrl($courseSession);
        return response([
           'join_meeting_url' =>  $joinMeetingUrl,
        ]);
    }

    public function joinMeeting()
    {
        return view('user.course-sessions.zoom-meeting');
    }
}
