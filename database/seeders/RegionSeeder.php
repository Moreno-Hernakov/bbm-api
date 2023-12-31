<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create([
            "kd_region" => 1,
            "nama_region" => "a1"
        ]);

        Region::create([
            "kd_region" => 2,
            "nama_region" => "a2"
        ]);
    }
}
