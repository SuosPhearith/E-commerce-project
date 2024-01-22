<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'This is admin role.'
            ],
            [
                'name' => 'vendor',
                'description' => 'This is vendor role.'
            ],
            [
                'name' => 'customer',
                'description' => 'This is customer role.'
            ],
        ]);
    }
}
