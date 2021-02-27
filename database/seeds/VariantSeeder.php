<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variants')->insert([
            'title' => 'Variant One',
            'description' => 'some description about Variant one',
        ]);

        DB::table('variants')->insert([
            'title' => 'Variant Two',
            'description' => 'some description about Variant Two',
        ]);

        DB::table('variants')->insert([
            'title' => 'Variant Three',
            'description' => 'some description about Variant Three',
        ]);
    }
}
