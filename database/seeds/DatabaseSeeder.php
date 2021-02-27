<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(VariantSeeder::class);
        //$this->call(SizeSeeder::class);
        $this->call(ProductVariantSeeder::class);
        $this->call(ProductVariantPriceSeeder::class);
    }
}
