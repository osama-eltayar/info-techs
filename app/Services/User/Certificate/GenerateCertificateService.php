<?php

namespace App\Services\User\Certificate;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCertificate;
use App\Traits\HasFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class GenerateCertificateService
{
    use HasFiles;

    public static string $certificateSampleStoragePath = 'certificates/certificate-sample.jpg';
    public static string $certificateSavingStoragePath = 'certificates/';
    public static string $fontFilePath = 'fonts/ROBOTOCONDENSED-BOLD.TTF';
    public static string $certificateFileTemplate = 'user.certificates.partials.certificate-template';

    /**
     * @var User
     */
    private $user;

    /**
     * @var Course
     */
    private $course;

    /**
     * @param $data
     * @return UserCertificate
     */
    public function handle($data)
    {
        ['course' => $this->course, 'user' => $this->user] = $data;

        $certificate = UserCertificate::query()->firstOrCreate(['user_id' => $this->user->id, 'course_id' => $this->course->id]);

        if (!$certificate->url) {
            $imageName       = $this->generateCertificateImage();
            $certificatePath = $this->generateCertificateFile($imageName);
            $certificate->update(['path' => $certificatePath]);
        }

        return $certificate;
    }

    private function generateCertificateImage()
    {
        $image = Image::make(Storage::path($this->course->certificate_image));

        $image->text($this->user->name, 550, 350,
            function ($font) {
                $font->file(public_path(self::$fontFilePath));
                $font->size(50);
                $font->color('#434343');
                $font->align('center');
            });
        Storage::makeDirectory(self::$certificateSavingStoragePath . $this->user->id);
        $imageName = $this->getImageFileName();
        $image->save(Storage::path($imageName));
        return $imageName;
    }

    private function generateCertificateFile($imageName)
    {
        $pdf             = \PDF::loadView(self::$certificateFileTemplate, ['imageUrl' => $this->getFileUrl($imageName)]);
        $certificateName = $this->getCertificateFileName();
        $pdf->save(Storage::path($certificateName));
        $this->deleteFile($imageName);

        return $certificateName;
    }

    private function getImageFileName()
    {
        return self::$certificateSavingStoragePath .
               $this->user->id .
               '/' .
               Str::kebab($this->course->title_en) .
               '.jpeg';
    }

    private function getCertificateFileName()
    {
        return self::$certificateSavingStoragePath .
               $this->user->id .
               '/' .
               Str::kebab($this->course->title_en) .
               '.pdf';
    }

}
