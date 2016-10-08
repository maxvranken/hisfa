<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class LogsTableSeeder extends Seeder
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
            DB::table('logs')->insert([
                'date' => $faker->dateTimeThisYear($max = 'now') ,
                'data_type' => $faker->word,
                'object_id' => $faker->numberBetween(1,50),
                'quantity' => $faker->numberBetween(1,50),
                'percentage' => $faker->numberBetween(1,100),
            ]);
        }
    }
}
