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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pembelian_bbm');
            $table->integer('jumlah_uang');
            $table->string('gambar_dashboard_kendaraan');
            $table->string('gambar_kwitansi');
            $table->string('nama_spbu');
            $table->integer('kd_jenis_kendaraan');
            $table->foreign('kd_jenis_kendaraan')->references('kd_jenis_kendaraan')->on('jenis_kendaraans')->onDelete('cascade');
            $table->integer('kd_kendaraan');
            $table->foreign('kd_kendaraan')->references('kd_kendaraan')->on('kendaraans')->onDelete('cascade');
            $table->foreignId('kd_bbm')->constrained('bbms')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
