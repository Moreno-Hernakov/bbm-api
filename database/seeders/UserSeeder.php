<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => 1,
            'kd_unit' => 1,
            'name' => 'Lokpro Media',
            'username' => 'Lokpro Media',
            'email' => 'lokpro2023@gmail.com',
            'password' => bcrypt('lokpro2023'),
        ]);
    }
}
