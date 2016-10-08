<?php

use Illuminate\Database\Seeder;
use App\PrimeSilo;

class PrimeSilosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PrimeSilo::class, 5)->create();
    }
}
