<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kendaraan;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::create([
            "kd_kendaraan" => 1,
            "kd_jenis_kendaraan" => 1,
            "kd_unit" => 1,
            "kd_fungsi" => 1,   
            "nopol" => "L 1234 KT"
        ]);

        Kendaraan::create([
            "kd_kendaraan" => 2,
            "kd_jenis_kendaraan" => 1,
            "kd_unit" => 2,
            "kd_fungsi" => 1,   
            "nopol" => "L 1234 RFP"
        ]);
    }
}
