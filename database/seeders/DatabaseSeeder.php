<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

           
        User::create([
            'name' => 'Lokpro Media',
            'email' => 'lokpro2023@gmail.com',
            'nomor_telfon' => '082131230184',
            'password' => bcrypt('lokpro2023'),
        ]);
    }
}
