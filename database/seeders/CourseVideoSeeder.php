<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::find(3)->videos()->createMany([
                                                  [
                                                      'name_en'      => 'video 1',
                                                      'name_ar'      => 'الفيديو 1',
                                                      'path'      => 'courses/3/videos/video1.mp4',
                                                      'mime_type' => 'mp4',
                                                      'size'      => 25,
                                                      'duration'      => 6,
                                                      'is_free'      => true,
                                                  ],
                                                  [
                                                      'name_en'      => 'video 2',
                                                      'name_ar'      => 'الفيديو 2',
                                                      'path'      => 'courses/3/videos/video2.mp4',
                                                      'mime_type' => 'mp4',
                                                      'size'      => 25,
                                                      'duration'      => 4,
                                                      'is_free'      => false,
                                                  ]
                                              ]);
    }
}
