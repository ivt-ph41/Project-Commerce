<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory As Faker;
use Illuminate\Support\Facades\DB;
use Str;

class ProductSeeder extends Seeder
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
            DB::table('products')->insert(
                [
                    'name' => 'Fashion'.rand(1,1000),
                    'slug' => $faker->name,
                    'short_description' => 'ok'.rand(1,5),
                    'description' => 'very'.rand(1,5),
                    'regular_price' => rand(20000,200000),
                    'sale_price' => rand(10000,100000),
                    'SKU' => Str::random(4),
                    'stock_status' => 'instock',
                    'image' => 'fashion'.rand(1,8).'.jpg',
                    'images' => 'fashion'.rand(1,8).'.jpg',
                    'category_id' => 7
                ]
                );
        }
    }
}
