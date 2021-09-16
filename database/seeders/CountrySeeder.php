<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ds = DIRECTORY_SEPARATOR;
        $file = File::get(database_path('seeders') . $ds . 'sql' . $ds . 'countries.sql' );
        \DB::statement($file);
    }
}
