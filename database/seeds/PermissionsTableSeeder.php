<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'view foam stock']);
        Permission::create(['name' => 'view prime silos']);
        Permission::create(['name' => 'view waste silos']);
        Permission::create(['name' => 'edit foam stock']);
        Permission::create(['name' => 'edit prime silos']);
        Permission::create(['name' => 'edit waste silos']);
        Permission::create(['name' => 'change user permissions']);
    }
}