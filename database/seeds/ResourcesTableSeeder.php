<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class ResourcesTableSeeder extends Seeder
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
            DB::table('resources')->insert([
                'name' => $faker->word,
                'quantity' => $faker->numberBetween(1,100),
            ]);
        }
    }
}
