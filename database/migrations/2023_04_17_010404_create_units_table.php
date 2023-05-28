<?php

use App\Models\Area;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Regions;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->index('kd_unit');
            $table->integer('kd_unit');

            $table->integer('kd_area');
            $table->foreign('kd_area')->references('kd_area')->on('areas')->onDelete('cascade');
            $table->string('nama_unit');
            $table->timestamps();
        });
            //relasi ke table regions



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
