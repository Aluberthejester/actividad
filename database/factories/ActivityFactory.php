<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrayValues = ['waiting', ' finished,', ' postponed', 'cancelled', 'removed'];
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence,
            'register_date' => now(),
            'finished_date' => $this->faker->dateTimeBetween("-1 day" , now()),
            'change_date' => $this->faker->dateTimeBetween("-3 day" , now())
        ];
    }
}
