<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        for ($i = 0; $i < 3; $i++) {
            DB::table('movies')->insert([
                'movie_name' => $faker->movie,
                'release_year' => random_int(1920, 2023),
                'air_time' => random_int(90, 140),
                'distributor_id' => random_int(0, 1),
                'genre_id' => random_int(0, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
