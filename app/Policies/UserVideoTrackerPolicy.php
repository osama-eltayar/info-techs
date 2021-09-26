<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\CourseSession;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserVideoTrackerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updateSessionTracker( User $user, $sessionId )
    {
        $session = CourseSession::find($sessionId);
        if ( !$user->can('view',$session) )
            return $this->deny('not allowed to join this session');
        return true;
    }

    private function isSessionExistsInRegisteredCourses( $user, $sessionId )
    {
        return $user->registeredCourses()
                    ->whereHas('sessions', function ( $q ) use ( $sessionId ) {
                        $q->where('id', $sessionId);
                    })
                    ->exists();
    }
}
