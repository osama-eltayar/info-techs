<?php

namespace App\Services\User\Badge;

use App\Models\Course;
use App\Models\User;
use App\Models\UserBadge;
use App\Traits\HasFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class GenerateBadgeService
{
    use HasFiles;

    public static string $badgeSampleStoragePath = 'badges/badge-sample.jpg';
    public static string $badgeSavingStoragePath = 'badges/';
    public static string $fontFilePath = 'fonts/ROBOTOCONDENSED-BOLD.TTF';
    public static string $badgeFileTemplate = 'user.badges.partials.badge-template';

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
     * @return UserBadge
     */
    public function handle($data)
    {
        ['course' => $this->course, 'user' => $this->user] = $data;

        $badge = UserBadge::query()->firstOrCreate(['user_id' => $this->user->id, 'course_id' => $this->course->id]);

        if (!$badge->url) {
            $imageName       = $this->generateBadgeImage();
            $badgePath = $this->generateBadgeFile($imageName);
            $badge->update(['path' => $badgePath]);
        }

        return $badge;
    }

    private function generateBadgeImage()
    {
        $image = Image::make(Storage::path($this->course->badge));

        $image->text($this->user->name, 400, 340,
            function ($font) {
                $font->file(public_path(self::$fontFilePath));
                $font->size(50);
                $font->color('#434343');
                $font->align('center');
            });
        Storage::makeDirectory(self::$badgeSavingStoragePath . $this->user->id);
        $imageName = $this->getImageFileName();
        $image->save(Storage::path($imageName));
        return $imageName;
    }

    private function generateBadgeFile($imageName)
    {
        $pdf             = \PDF::loadView(self::$badgeFileTemplate, ['imageUrl' => $this->getFileUrl($imageName)]);
        $badgeName = $this->getBadgeFileName();
        $pdf->save(Storage::path($badgeName));
//        $this->deleteFile($imageName);

        return $badgeName;
    }

    private function getImageFileName()
    {
        return self::$badgeSavingStoragePath .
               $this->user->id .
               '/' .
               Str::kebab($this->course->title_en) .
               '.jpeg';
    }

    private function getBadgeFileName()
    {
        return self::$badgeSavingStoragePath .
               $this->user->id .
               '/' .
               Str::kebab($this->course->title_en) .
               '.pdf';
    }

}
