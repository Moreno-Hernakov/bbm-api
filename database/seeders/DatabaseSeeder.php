<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JenisKendaraan;
use App\Models\Area;
use App\Models\Kendaraan;
use App\Models\Unit;
use App\Models\Saldo;
use App\Models\Region;
use App\Models\bbm;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Region::create([
            "kd_region" => 1,
            "nama_region" => "a1"
        ]);

        Area::create([
            "kd_area" => 1,
            "nama_area" => "surabaya",
            "kd_region" => 1
        ]);

        Unit::create([
            'nama_unit' => "coba_unit",
            'kd_unit' => 1,
            'kd_area' => 1,
        ]);

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

        Kendaraan::create([
            "kd_kendaraan" => 1,
            "kd_jenis_kendaraan" => 1,
            "kd_unit" => 1,
            "kd_fungsi" => 1,   
            "nopol" => "L 1234 KT"
        ]);

        bbm::create([
            "jenis_bbm" => "pertalite",
            "nama_Spbu" => "pertamina",
            "kendaraan_id" => 1,
        ]);
           

        User::create([
            'user_id' => 1,
            'name' => 'Lokpro Media',
            'username' => 'Lokpro Media',
            'email' => 'lokpro2023@gmail.com',
            'password' => bcrypt('lokpro2023'),
        ]);
    }
}
