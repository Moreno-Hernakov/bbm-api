<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Area;
use App\Models\Wilayah;
use App\Models\Unit;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            
            $table->integer('kd_unit');
            $table->foreign('kd_unit')->references('kd_unit')->on('units');
            $table->integer('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('jumlah_saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldos');
    }
};
