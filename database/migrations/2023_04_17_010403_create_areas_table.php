<?php

use App\Models\Wilayah;
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
        Schema::create('areas', function (Blueprint $table) {
            $table->index('kd_area');
            $table->integer('kd_area');
            $table->integer('kd_region');
            $table->foreign('kd_region')->references('kd_region')->on('regions')->onDelete('cascade');
            $table->string('nama_area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
