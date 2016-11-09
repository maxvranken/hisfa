<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin'])->givePermissionTo('view dashboard', 'view foam stock', 'view prime silos',
        'view waste silos', 'edit foam stock', 'edit prime silos', 'edit waste silos', 'change user permissions');
    }
}
