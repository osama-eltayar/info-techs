<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<5 ; $i++)
        {
            Speciality::firstOrCreate([
                'name_en' => 'speciality' . $i,
                'name_ar' => 'تخصص' . $i
            ]);
        }
    }
}
