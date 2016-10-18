<?php

use Illuminate\Database\Seeder;
use App\Block;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([
            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 1],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 1],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 1],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 1],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 2],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 2],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 2],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 2],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 3],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 3],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 3],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 3],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 4],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 4],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 4],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 4],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 5],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 5],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 5],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 5],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 6],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 6],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 6],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 6],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 7],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 7],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 7],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 7],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 8],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 8],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 8],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 8],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 9],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 9],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 9],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 9],

            ['quantity' => rand(1, 20), 'length' => 4, 'foam_type_id' => 10],
            ['quantity' => rand(1, 20), 'length' => 6, 'foam_type_id' => 10],
            ['quantity' => rand(1, 20), 'length' => 8, 'foam_type_id' => 10],
            ['quantity' => rand(1, 20), 'length' => 12, 'foam_type_id' => 10]
        ]);
    }
}
