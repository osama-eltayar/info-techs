<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Speaker;
use App\Models\Speciality;
use App\Models\UserTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpeakerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speaker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar' => $this->faker->name(),
            'name_en' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => $this->faker->unique()->phoneNumber(),
            'bio' => $this->faker->text(),
            'position' => $this->faker->word(),
            'user_title_id' => UserTitle::inRandomOrder()->select('id')->first()->id,
            'speciality_id' => Speciality::inRandomOrder()->select('id')->first()->id,
            // 'country_id' => Country::inRandomOrder()->select('id')->first()->id,
            // 'city_id' => City::inRandomOrder()->select('id')->first()->id,
        ];
    }
}
