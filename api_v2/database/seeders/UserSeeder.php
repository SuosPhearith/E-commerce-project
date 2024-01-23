<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Suos Phearith',
                'email' => 'phearith@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'image' => 'image.jpg',
                'role_id' => 1,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vann Chansethy',
                'email' => 'sethy@gmail.com',
                'email_verified_at' => now(),
                'password' =>  Hash::make('12345678'),
                'image' => 'image.jpg',
                'role_id' => 2,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Song Kheang',
                'email' => 'Kheang@gmail.com',
                'email_verified_at' => now(),
                'password' =>  Hash::make('12345678'),
                'image' => 'image.jpg',
                'role_id' => 3,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tom Tito',
                'email' => 'tito@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'image' => 'image.jpg',
                'role_id' => 3,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
