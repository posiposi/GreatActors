<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * 映画テーブルに投入するテストデータ定義
     *
     * @return void
     */
    public function definition()
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
