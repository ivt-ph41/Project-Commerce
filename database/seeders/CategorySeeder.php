<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory As Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $value) {
            DB::table('categories')->insert(
                [
                    'name' => $faker->name,
                    'sluk' => $faker->name,
                ]
                );
        }
    }
}
