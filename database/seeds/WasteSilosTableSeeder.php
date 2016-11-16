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
        //factory(WasteSilo::class, 3)->create();
        DB::table('waste_silos')->insert([
            ['name' => 'Low', 'percentage' => 60, 'resource_id' => '5'],
            ['name' => 'Medium', 'percentage' => 50, 'resource_id' => '3'],
            ['name' => 'High', 'percentage' => 10, 'resource_id' => '2']
        ]);
    }
}
