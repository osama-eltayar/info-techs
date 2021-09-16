<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\CertificateMail;
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
        $certificates = Auth::user()->certificates;
        return view('user.certificates.index', compact('certificates'));
    }

    public function print( UserCertificate $certificate, GenerateCertificateService $generateCertificateService )
    {
        if ( !$certificate->url ) {
            $certificatePath = $generateCertificateService->handle([ 'user' => Auth::user(), 'certificate' => $certificate ]);
            $certificate->update([ 'path' => $certificatePath ]);
        }

        return Storage::download($certificate->path);
    }

    public function send( UserCertificate $certificate, GenerateCertificateService $generateCertificateService )
    {
        if ( !$certificate->url ) {
            $certificatePath = $generateCertificateService->handle([ 'user' => Auth::user(), 'certificate' => $certificate ]);
            $certificate->update([ 'path' => $certificatePath ]);
        }
        Mail::to(Auth::user())->send(new CertificateMail($certificate));
        return redirect()->back();
    }
}
