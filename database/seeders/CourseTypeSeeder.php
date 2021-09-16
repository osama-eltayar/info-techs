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
            'name_ar' => 'اونلاين ايفنت'
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Online Course',
            'name_ar' => 'اونلاين كورس'
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Recorded',
            'name_ar' => 'مسجل',
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Physical',
            'name_ar' => 'مادي',
        ]);
        CourseType::firstOrcreate([
            'name_en' => 'Hybrid',
            'name_ar' => 'مزدوج',
        ]);
    }
}
