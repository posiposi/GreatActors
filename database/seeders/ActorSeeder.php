<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));
        for($i = 0; $i < 3; $i++) {
            DB::table('actors')->insert([
                'actor_name' => $faker->actor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
