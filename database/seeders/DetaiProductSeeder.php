<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory As Faker;
class DetaiProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,34) as $value) {
            DB::table('detai_products')->insert(
                [
                    'origin' => $faker->country,
                    'brand' => $faker->company,
                    'color' => $faker->colorName,
                    'dimension' => '20 X 30 X 40 cm',
                    'weight' => rand(1,10).'kg',
                    'product_id' => 7,
                ]
                );
        }
    }
}
