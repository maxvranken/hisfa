<?php

use Illuminate\Database\Seeder;
use App\FoamType;

class FoamTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foam_types')->insert([
            ['name' => 'P15', 'density' => 0],
            ['name' => '60SE', 'density' => 0],
            ['name' => 'P20', 'density' => 0],
            ['name' => '100SE', 'density' => 0],
            ['name' => 'P25', 'density' => 0],
            ['name' => '150SE', 'density' => 0],
            ['name' => 'P30', 'density' => 0],
            ['name' => '200E', 'density' => 0],
            ['name' => 'P35', 'density' => 0],
            ['name' => '250E', 'density' => 0]
        ]);
    }
}
