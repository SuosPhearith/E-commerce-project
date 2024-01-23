<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'red', 'description' => 'Bright red color'],
            ['name' => 'blue', 'description' => 'Deep blue color'],
            ['name' => 'green', 'description' => 'Vibrant green color'],
            ['name' => 'yellow', 'description' => 'Sunshine yellow color'],
            ['name' => 'purple', 'description' => 'Royal purple color'],
        ];

        foreach ($colors as $color) {
            DB::table('colors')->insert($color);
        }
    }
}
