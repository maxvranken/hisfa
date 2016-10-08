<?php

use Illuminate\Database\Seeder;
use App\FoamType;

class FoamTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FoamType::class, 20)->create();
    }
}
