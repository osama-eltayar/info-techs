<?php

namespace App\Services\User\Session;

use App\Models\CourseSession;

interface SessionServiceInterface
{
    public function getJoinMeetingUrl(CourseSession $courseSession);
}
