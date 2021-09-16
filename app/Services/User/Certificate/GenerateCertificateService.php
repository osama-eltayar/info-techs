<?php

namespace App\Services\User\Certificate;

use App\Traits\HasFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class GenerateCertificateService
{
    use HasFiles;

    public static string $certificateSampleStoragePath = 'certificates/certificate-sample.jpg';
    public static string $certificateSavingStoragePath = 'certificates/';
    public static string $fontFilePath                 = 'fonts/ROBOTOCONDENSED-BOLD.TTF';
    public static string $certificateFileTemplate      = 'user.certificates.partials.certificate-template';

    public function handle( $data )
    {
        $imageName = $this->generateCertificateImage($data);
        return $this->generateCertificateFile($data, $imageName);
    }

    private function generateCertificateImage( $data )
    {
        $image = Image::make(Storage::path($data[ 'certificate' ]->course->certificate_image));

        $image->text($data[ 'user' ]->name, 550, 350, function ( $font ) {
            $font->file(public_path(self::$fontFilePath));
            $font->size(50);
            $font->color('#434343');
            $font->align('center');
        });
        Storage::makeDirectory(self::$certificateSavingStoragePath . $data[ 'user' ]->id);
        $imageName = $this->getImageFileName($data[ 'user' ], $data[ 'certificate' ]);
        $image->save(Storage::path($imageName));
        return $imageName;
    }

    private function generateCertificateFile( $data, $imageName )
    {
        $pdf             = \PDF::loadView(self::$certificateFileTemplate, [ 'imageUrl' => $this->getFileUrl($imageName) ]);
        $certificateName = $this->getCertificateFileName($data[ 'user' ], $data[ 'certificate' ]);
        $this->deleteFile($imageName);
        $pdf->save(Storage::path($certificateName));

        return $certificateName;
    }

    private function getImageFileName( $user, $certificate )
    {
        return self::$certificateSavingStoragePath . $user->id . '/' . Str::kebab($certificate->course->title_en) . '.jpg';
    }

    private function getCertificateFileName( $user, $certificate )
    {
        return self::$certificateSavingStoragePath . $user->id . '/' . Str::kebab($certificate->course->title_en) . '.pdf';
    }

}
