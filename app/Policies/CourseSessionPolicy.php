<?php

namespace App\Policies;

use App\Models\CourseSession;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class CourseSessionPolicy
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

    public function view(User $user,CourseSession $courseSession)
    {
        if ( !$this->isSessionExistsInRegisteredCourses($user, $courseSession->id) )
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
