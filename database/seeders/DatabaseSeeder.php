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
        $this->call(UserRankSeeder::class);
        $this->call(AdminSeeder::class);
//        $this->call(CourseSeeder::class);
//        $this->call(CourseTypeSeeder::class);
//        $this->call(OrganizationSeeder::class);
//        $this->call(CourseVideoSeeder::class);
//        $this->call(CountrySeeder::class);
//        $this->call(CitySeeder::class);
        $this->call(SpeakerSeeder::class);
    }
}
