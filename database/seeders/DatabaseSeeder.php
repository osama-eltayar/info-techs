<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(UserTitleSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(OrganizationSeeder::class);
//        $this->call(CountrySeeder::class);
        $this->call(CourseVideoSeeder::class);
    }
}
