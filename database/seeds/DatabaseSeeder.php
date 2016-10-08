<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(FoamTypesTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(PrimeSilosTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(WasteSilosTableSeeder::class);
    }
}
