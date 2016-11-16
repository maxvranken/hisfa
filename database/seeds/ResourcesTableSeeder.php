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
            ['name' => 'f21MB-n', 'quantity' => 1, 'icon' => 'default_icon.svg'],
            ['name' => 'RF23W-n', 'quantity' => 0, 'icon' => 'default_icon.svg'],
            ['name' => 'KSE-20', 'quantity' => 4, 'icon' => 'default_icon.svg'],
            ['name' => 'KSE-30', 'quantity' => 2, 'icon' => 'default_icon.svg'],
            ['name' => 'F21B-n', 'quantity' => 3, 'icon' => 'default_icon.svg']
        ]);
    }
}
