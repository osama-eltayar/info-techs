<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<5; $i++)
        {
            $country = Country::query()->firstOrCreate(['name'=>'country '.$i]);
            for ($x = 1; $x<4; $x++)
            {
                $country->cities()->firstOrCreate(['name' =>'city '.$i.'-'.$x]);
            }
        }

    }
}
