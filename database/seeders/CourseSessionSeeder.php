<?php

namespace Database\Seeders;

use App\Models\CourseSession;
use Illuminate\Database\Seeder;

class CourseSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSession::firstOrCreate(
            [
                'name' => 'session test name',
            ],
            [
                'zoom_meeting_id'       => '85106844228',
                'zoom_meeting_password' => 'U7546U',
                'course_id'             => '3',
                'duration'              => '60',
                'start_at'              => now(),
            ]);

        CourseSession::firstOrCreate(
            [
                'name' => 'session test name 2',
            ],
            [
                'zoom_meeting_id'       => '85106844228',
                'zoom_meeting_password' => 'U7546U',
                'course_id'             => '3',
                'duration'              => '50',
                'start_at'              => now(),
            ]);
    }
}
