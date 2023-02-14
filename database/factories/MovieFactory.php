<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_name' => $this->faker->name(),
            'release_year' => random_int(1900, 2023),
            'air_time' => random_int(60, 140),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
