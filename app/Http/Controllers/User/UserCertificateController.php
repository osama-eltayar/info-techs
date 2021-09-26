<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\CertificateMail;
use App\Models\Course;
use App\Models\UserCertificate;
use App\Services\User\Certificate\GenerateCertificateService;
use App\Traits\HasFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserCertificateController extends Controller
{

    public function index()
    {
        $courses = Course::query()->whereHas('registeredAuthUser')->withSum('authUserTrackers','check_point')->get();

        return view('user.certificates.index', compact('courses'));
    }

    public function print( Course $course, GenerateCertificateService $generateCertificateService )
    {
        $certificate = $generateCertificateService->handle([ 'user' => Auth::user(), 'course' => $course ]);

        return Storage::download($certificate->path);
    }

    public function send( Course $course, GenerateCertificateService $generateCertificateService )
    {
        $certificate =  $generateCertificateService->handle([ 'user' => Auth::user(), 'course' => $course ]);

        Mail::to(Auth::user())->send(new CertificateMail($certificate));
        return redirect()->back();
    }
}
