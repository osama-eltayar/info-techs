<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++)
            Organization::firstOrCreate([
                                            'name_en' => 'organization ' . $i,
                                            'name_ar' => 'منظمه ' . $i,
                                            'logo'    => '/organizations/logo.png'
                                        ]);
    }
}
