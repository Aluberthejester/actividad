<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $arrayValues = ['waiting', ' finished,', 'postponed', 'cancelled', 'removed'];
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence,
            'state' => $arrayValues[0],
            'register_date' => now(),
            'finished_date' => $this->faker->dateTimeBetween("-3 day" , now()),
            'change_date' => $this->faker->dateTimeBetween("-1 day" , now()),  
            
        ];
    }
}
