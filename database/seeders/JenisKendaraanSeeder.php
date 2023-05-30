<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisKendaraan;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisKendaraan::create([
            "kd_jenis_kendaraan" => 1,
            "jenis" => "mobil",
        ]);
        
        JenisKendaraan::create([
            "kd_jenis_kendaraan" => 2,
            "jenis" => "truk",
        ]);

        JenisKendaraan::create([
            "kd_jenis_kendaraan" => 3,
            "jenis" => "sepeda motor",
        ]);
    }
}
