<?php

namespace Database\Seeders;

use App\Models\CourseType;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseType::firstOrcreate([
            'name_en' => 'Online Event',
            'name_ar' => 'Online Event'
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Online Course',
            'name_ar' => 'Online Course'
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Recorded',
            'name_ar' => 'Recorded'
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Physical',
            'name_ar' => 'Physical'
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Hybrid',
            'name_ar' => 'Hybrid'
        ]);
    }
}
