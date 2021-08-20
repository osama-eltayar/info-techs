<?php

namespace App\Services\User\Session\Zoom;

use App\Models\CourseSession;
use App\Services\User\Session\SessionServiceInterface;
use Illuminate\Support\Facades\Auth;

class ZoomMeetingService implements SessionServiceInterface
{
    public  $apiKey;
    private $apiSecret;

    public function __construct()
    {
        $this->apiKey    = config('zoom.api_key');
        $this->apiSecret = config('zoom.api_secret');
    }

    public function getJoinMeetingUrl( CourseSession $courseSession )
    {
        $signature = $this->generateSignature($courseSession->zoom_meeting_id);
        return route('course-sessions.join-meeting', [
            'course_session' => $courseSession->id,
            'name'           => Auth::user()->name,
            'email'          => Auth::user()->email,
            'password'       => $courseSession->zoom_meeting_password,
            'role'           => 0,
            'lang'           => 'en-US',
            'signature'      => $signature,
            'api_key'        => $this->apiKey,
            'meeting_number' => $courseSession->zoom_meeting_id,
        ]);
    }

    private function generateSignature( $meetingNumber, $role = 0 )
    {
        //Set the timezone to UTC
        date_default_timezone_set("UTC");

        $time = time() * 1000 - 30000;//time in milliseconds (or close enough)

        $data = base64_encode($this->apiKey . $meetingNumber . $time . $role);

        $hash = hash_hmac('sha256', $data, $this->apiSecret, true);

        $_sig = $this->apiKey . "." . $meetingNumber . "." . $time . "." . $role . "." . base64_encode($hash);

        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }


}
