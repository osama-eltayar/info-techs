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
        UserTitle::query()->truncate();
        $userTitles = ['Dr.','Mr.','Mrs.','Ms.','Prof.'] ;
        foreach($userTitles as $userTitle)
        {
            UserTitle::firstOrCreate([
                'name_en' => $userTitle,
                'name_ar' => $userTitle
            ]);
        }
    }
}
