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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@hisfa',
            'password' => bcrypt('hisfa'),
            'remember_token' => str_random(10)
        ],
        [
            'name' => 'Tom',
            'email' => 'tom@changeme.hisfa',
            'password' => bcrypt('hisfa'),
            'remember_token' => str_random(10)
        ]);
    }
}
