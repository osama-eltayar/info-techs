<?php

namespace App\Observers;

use App\Models\CourseSession;

class CourseSessionObserver
{
    public function updating(CourseSession $courseSession)
    {
        if ($courseSession->zoom_meeting_id && $courseSession->zoom_meeting_password)
            $courseSession->type = CourseSession::ONLINE;
        else
            $courseSession->type = null;
    }
}
