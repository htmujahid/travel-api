<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'is_public' => fake()->boolean(),
            'description' => fake()->text(100),
            'number_of_days' => 1,
        ];
    }
}
