<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;

// use App\Models\JenisKendaraan;
// use App\Models\Area;
// use App\Models\Kendaraan;
// use App\Models\Unit;
// use App\Models\Saldo;
// use App\Models\Region;
// use App\Models\bbm;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RegionSeeder::class,
            AreaSeeder::class,
            UnitSeeder::class,
            BbmSeeder::class,
            JenisKendaraanSeeder::class,
            KendaraanSeeder::class,
        ]);

    }
}
