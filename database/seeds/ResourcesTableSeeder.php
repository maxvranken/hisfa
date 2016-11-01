<?php

use Illuminate\Database\Seeder;
use App\Resource;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            ['name' => 'f21MB-n', 'quantity' => 0, 'icon' => 'f21MB-n.jpg'],
            ['name' => 'RF23W-n', 'quantity' => 0, 'icon' => 'f21MB-n.jpg'],
            ['name' => 'KSE-20', 'quantity' => 0, 'icon' => 'f21MB-n.jpg'],
            ['name' => 'KSE-30', 'quantity' => 0, 'icon' => 'f21MB-n.jpg'],
            ['name' => 'F21B-n', 'quantity' => 0, 'icon' => 'f21MB-n.jpg']
        ]);
    }
}
