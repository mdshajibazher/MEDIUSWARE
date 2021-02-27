<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variant_prices')->insert([
            'product_variant_one' => 1,
            'product_variant_two' => 2,
            'product_variant_three' => 3,
            'price' => rand(20,150),
            'stock' => rand(20,150),
            'product_id' => rand(1,3),
        ]);
    }
}
