<?php

use App\Models\Area;
use App\Models\Wilayah;
use App\Models\JenisKendaraan;
use App\Models\Unit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->index('kd_kendaraan');
            $table->integer('kd_kendaraan');
            $table->integer('kd_unit');
            $table->foreign('kd_unit')->references('kd_unit')->on('units')->onDelete('cascade');
            $table->integer('kd_fungsi');
            $table->string('nopol');
            $table->integer('kd_jenis_kendaraan');
            $table->foreign('kd_jenis_kendaraan')->references('kd_jenis_kendaraan')->on('jenis_kendaraans')->onDelete('cascade');
            // $table->integer('kd_merk_kendaraan');
            // $table->foreign('kd_merk_kendaraan')->references('kd_merk_kendaraan')->on('merk_kendaraans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
