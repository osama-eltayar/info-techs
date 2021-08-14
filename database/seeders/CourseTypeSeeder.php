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
            'name' => 'Online Event'
        ]);
        CourseType::firstOrcreate([
            'name' => 'Online Course'
        ]);
        CourseType::firstOrcreate([
            'name' => 'Recorded'
        ]);
        CourseType::firstOrcreate([
            'name' => 'Physical'
        ]);
        CourseType::firstOrcreate([
            'name' => 'Hybrid'
        ]);
    }
}
