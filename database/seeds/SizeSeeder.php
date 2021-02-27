<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'name' => 'XL',
        ]);
        DB::table('sizes')->insert([
            'name' => 'SM',
        ]);

        DB::table('sizes')->insert([
            'name' => '15 gm',
        ]);
    }
}
