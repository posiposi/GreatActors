<?php

namespace Database\Seeders;

use App\Models\Distributor;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::factory()->count(3)->create();
        Distributor::factory(3)->recycle($movies)->create();
    }
}
