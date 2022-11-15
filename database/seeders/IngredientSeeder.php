<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => 'basil',
            'value' => rand(0,30),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'lavender',
            'value' => rand(0,30),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'chives',
            'value' => rand(0,30),
        ]);
    }
}
