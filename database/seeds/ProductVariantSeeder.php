<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variants')->insert([
            'variant' => 'Variant Combination 1',
            'variant_id' => 1,
            'product_id' => 1,
        ]);

        
        DB::table('product_variants')->insert([
            'variant' => 'Variant Combination 2',
            'variant_id' => 1,
            'product_id' => 2,
        ]);

          
        DB::table('product_variants')->insert([
            'variant' => 'Variant Combination 3',
            'variant_id' => 1,
            'product_id' => 3,
        ]);

        DB::table('product_variants')->insert([
            'variant' => 'Variant Combination 4',
            'variant_id' => 2,
            'product_id' => 1,
        ]);

        DB::table('product_variants')->insert([
            'variant' => 'Variant Combination 5',
            'variant_id' => 2,
            'product_id' => 2,
        ]);
        DB::table('product_variants')->insert([
            'variant' => 'Variant Combination 5',
            'variant_id' => 2,
            'product_id' => 3,
        ]);
    }
}
