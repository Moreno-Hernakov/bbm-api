<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JenisKendaraan;
use App\Models\MerkKendaraan;
use App\Models\Wilayah;
use App\Models\Area;
use App\Models\Kendaraan;
use App\Models\Unit;
use App\Models\Saldo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

           
        Wilayah::create([
            'nama_wilayah' => 'surabaya'
        ]);

        Area::create([
            "nama_area" => "surabaya",
            "wilayah_id" => 1
        ]);

        Unit::create([
            'area_id' => 1,
        ]);

        JenisKendaraan::create([
            "jenis" => "box",
        ]);

        Kendaraan::create([
            "jenis_kendaraan_id" => 1,
            "unit_id" => 1
        ]);
           
        MerkKendaraan::create([
            'merk' => 'toyota'
        ]);

        User::create([
            'name' => 'Lokpro Media',
            'email' => 'lokpro2023@gmail.com',
            'nomor_telfon' => '082131230184',
            'password' => bcrypt('lokpro2023'),
        ]);
    }
}
