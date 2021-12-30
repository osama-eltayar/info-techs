<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ds = DIRECTORY_SEPARATOR;
        $file = File::get(database_path('seeders') . $ds . 'sql' . $ds . 'cities.sql' );
        \DB::statement($file);
    }
}
