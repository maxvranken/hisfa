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
            ['quantity' => 0, 'length' => 4, 'foamType_id' => 1],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 1],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 1],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 1],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 2],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 2],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 2],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 2],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 3],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 3],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 3],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 3],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 4],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 4],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 4],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 4],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 5],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 5],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 5],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 5],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 6],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 6],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 6],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 6],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 7],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 7],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 7],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 7],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 8],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 8],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 8],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 8],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 9],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 9],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 9],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 9],

            ['quantity' => 0, 'length' => 4, 'foamType_id' => 10],
            ['quantity' => 0, 'length' => 6, 'foamType_id' => 10],
            ['quantity' => 0, 'length' => 8, 'foamType_id' => 10],
            ['quantity' => 0, 'length' => 12, 'foamType_id' => 10]
        ]);
    }
}
