<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@hisfa';
        $admin->password = bcrypt('hisfa');
        $admin->save();
        $admin->assignRole('admin');

        $user = new User;
        $user->name = 'Tom';
        $user->email = 'tom@changeme.hisfa';
        $user->password = bcrypt('hisfa');
        $user->save();
        $user->assignRole('admin');
    }
}
