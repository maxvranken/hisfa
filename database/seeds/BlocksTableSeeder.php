<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('blocks')->insert([
                'quantity' => $faker->numberBetween(1,20),
                'length' => $faker->numberBetween(1,15),
            ]);
        }
    }
}
