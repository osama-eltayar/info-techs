<?php

namespace Database\Seeders;

use App\Models\UserTitle;
use Illuminate\Database\Seeder;

class UserTitleSeeder extends Seeder
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
            UserTitle::firstOrCreate(['name' => 'title' . $i]);
        }
    }
}
