<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create', 'description' => 'Permission to create'],
            ['name' => 'update', 'description' => 'Permission to update'],
            ['name' => 'show', 'description' => 'Permission to show'],
            ['name' => 'delete', 'description' => 'Permission to delete'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert($permission);
        }
    }
}
