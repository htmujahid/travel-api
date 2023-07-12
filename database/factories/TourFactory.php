<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'starting_date' => now(),
            'ending_date' => now()->addDay(rand(1, 10)),
            'price' => fake()->randomFloat(nbMaxDecimals: 2, min: 10, max: 999),
        ];
    }
}
