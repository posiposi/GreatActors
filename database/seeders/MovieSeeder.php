<?php

namespace Database\Seeders;

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
        DB::table('movies')->insert([
            'movie_name' => Str::random(10),
            'release_year' => random_int(1900, 2023),
            'air_time' => random_int(60, 140),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
