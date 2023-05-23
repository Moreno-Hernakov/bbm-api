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
        Schema::create('komposisis', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_konsumsi_bbm');
            $table->integer('jarak_tempuh');
            $table->integer('jumlah_uang');
            $table->string('gambar');
            $table->string('gambar_kwitansi');
            $table->foreignId('jenis_kendaraan_id')->constrained('jenis_kendaraans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komposisis');
    }
};
