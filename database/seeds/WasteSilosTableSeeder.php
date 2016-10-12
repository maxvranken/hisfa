<?php

use Illuminate\Database\Seeder;
use App\WasteSilo;

class WasteSilosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WasteSilo::class, 3)->create();
    }
}
