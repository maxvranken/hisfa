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
        $this->call(FoamTypesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(PrimeSilosTableSeeder::class);
        $this->call(WasteSilosTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
