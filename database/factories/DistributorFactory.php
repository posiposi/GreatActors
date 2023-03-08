<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distributor>
 */
class DistributorFactory extends Factory
{
    /**
     * 配給会社テーブルに投入するテストデータ定義
     *
     * @return void
     */
    public function definition()
    {
        return [
            'movie_id' => Movie::Factory(),
            'distributor_name' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
