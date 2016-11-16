<?php

use Illuminate\Database\Seeder;
use App\Log;
use Carbon\Carbon;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Log::class, 50)->create();
        DB::table('logs')->insert([
            ['date' => Carbon::now(), 'data_type' => 'prime', 'object_id' => 1, 'quantity' => 0.00, 'percentage' => 50, 'message'=>''],
            ['date' => Carbon::now(), 'data_type' => 'prime', 'object_id' => 2, 'quantity' => 0.00, 'percentage' => 90],
            ['date' => Carbon::now(), 'data_type' => 'waste', 'object_id' => 1, 'quantity' => 0.00, 'percentage' => 20],
            ['date' => Carbon::now(), 'data_type' => 'waste', 'object_id' => 3, 'quantity' => 0.00, 'percentage' => 70],
            ['date' => Carbon::now(), 'data_type' => 'resource', 'object_id' => 2, 'quantity' => 3.00, 'percentage' => 0],
            ['date' => Carbon::now(), 'data_type' => 'resource', 'object_id' => 4, 'quantity' => 5.00, 'percentage' => 0],
            ['date' => Carbon::now(), 'data_type' => 'prime', 'object_id' => 3, 'quantity' => 0.00, 'percentage' => 40],
            ['date' => Carbon::now(), 'data_type' => 'waste', 'object_id' => 2, 'quantity' => 0.00, 'percentage' => 20],
        ]);
    }
}
