<?php

namespace Database\Seeders;

use App\Models\UserRank;
use Illuminate\Database\Seeder;

class UserRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $ranks = ['Specialist',
                  'Technician',
                  'Fellow',
                  'Resident',
                  'Consultant',
        ];

        foreach ($ranks as $rank)
            UserRank::query()->firstOrCreate([
                                                 'name_en' => $rank,
                                                 'name_ar' => $rank
                                             ]);
    }
}
