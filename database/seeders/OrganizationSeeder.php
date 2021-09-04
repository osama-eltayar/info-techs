<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ( $i = 1; $i <= 5; $i++ )
            Organization::firstOrCreate([
                'name_en' => "Organization $i",
                'name_ar' => "منظمة $i",
                'logo' => '/organizations/logo.png'
            ]);
    }
}
