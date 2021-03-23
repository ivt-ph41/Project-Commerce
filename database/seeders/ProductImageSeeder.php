<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory As Faker;
class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $value) {
            DB::table('product_image')->insert(
                [
                    'images' => 'phone'.rand(1,6).'.jpg',
                    'product_id' => rand(6,25)
                ]
                );
        }
    }
}
