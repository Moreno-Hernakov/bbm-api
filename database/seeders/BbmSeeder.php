<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bbm;

class BbmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        bbm::create([
            "jenis_bbm" => "Dexlite"
        ]);

        bbm::create([
            "jenis_bbm" => "Pertalite"
        ]);

        bbm::create([
            "jenis_bbm" => "Pertamax"
        ]);

        bbm::create([
            "jenis_bbm" => "Pertamax Turbo"
        ]);

        bbm::create([
            "jenis_bbm" => "Solar"
        ]);
    }
}
