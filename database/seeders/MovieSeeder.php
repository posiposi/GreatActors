<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    /**
     * 映画テーブルに対してデータ設定を実行する
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');
        for ($i = 0; $i < 5; $i++) {
            DB::table('movies')->insert([
                'movie_name' => $faker->name,
                'release_year' => random_int(1920, 2023),
                'air_time' => random_int(90, 140),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
