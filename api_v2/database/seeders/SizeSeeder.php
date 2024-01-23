<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['name' => 's', 'description' => 'Small size'],
            ['name' => 'm', 'description' => 'Medium size'],
            ['name' => 'l', 'description' => 'Large size'],
        ];

        foreach ($sizes as $size) {
            DB::table('sizes')->insert($size);
        }
    }
}
