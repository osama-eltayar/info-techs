<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Mail\CertificateMail;
use App\Models\Course;
use App\Models\User;
use App\Services\User\Certificate\GenerateCertificateService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    public function send( Course $event,User $user, GenerateCertificateService $generateCertificateService )
    {
        abort_unless($event->registeredUsers()->where('users.id',$user->id)->exists(),403);
        $certificate =  $generateCertificateService->handle([ 'user' => $user, 'course' => $event ]);

        Mail::to($user)->send(new CertificateMail($certificate));
        return $this->successResponse([],'Certificate Sent Successfully.',Response::HTTP_CREATED);
    }
}
