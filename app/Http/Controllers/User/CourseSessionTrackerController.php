<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseSession;
use App\Models\UserVideoTracker;
use Illuminate\Http\Request;

class CourseSessionTrackerController extends Controller
{
    public function update( Request $request )
    {
        $this->authorize('updateSessionTracker',[UserVideoTracker::class,$request->trackable_id]);
        $request->validate([
            'trackable_id' => 'required',
            'check_point'  => 'required'
        ]);
        $tracker       = UserVideoTracker::firstOrCreate(
            $request->only('trackable_id') + [
                'user_id'        => auth()->id(),
                'trackable_type' => ( new CourseSession() )->getMorphClass(),
                'course_id'      => CourseSession::findOrFail($request->trackable_id)->course_id
            ],
            [ 'time_progress' => 0, 'check_point' => 0 ]
        );
        $newCheckPoint = $tracker->check_point + $request->check_point;
        if ( !$tracker->wasRecentlyCreated )
            $tracker->update([
                'time_progress' => $this->getCalculatedTimeProgress($newCheckPoint, $request->trackable_id),
                'check_point'   => $newCheckPoint
            ]);

        return response([]);
    }

    private function getCalculatedTimeProgress( $checkPoint, $sessionId )
    {
        $session = CourseSession::find($sessionId);
        return $checkPoint / $session->duration * 100;
    }

}
