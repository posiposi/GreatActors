<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * 俳優テーブルに対してデータ設定を実行する
     *
     * @return void
     */
    public function definition()
    {
        return [
            'actor_name' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
