<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create([
            'nama_unit' => "coba_unit",
            'kd_unit' => 1,
            'kd_area' => 1,
        ]);

        Unit::create([
            'nama_unit' => "unit 2",
            'kd_unit' => 2,
            'kd_area' => 2,
        ]);
    }
}
