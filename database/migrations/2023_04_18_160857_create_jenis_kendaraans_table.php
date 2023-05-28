<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_kendaraans', function (Blueprint $table) {
            $table->index('kd_jenis_kendaraan');
            $table->integer('kd_jenis_kendaraan');
            
            // $table->integer('kd_merk_kendaraan');
            // $table->foreign('kd_merk_kendaraan')->references('kd_merk_kendaraan')->on('merk_kendaraans')->onDelete('cascade');
            $table->string('jenis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kendaraans');
    }
};
