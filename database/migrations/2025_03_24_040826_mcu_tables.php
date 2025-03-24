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
        //
        schema::create('mcu', function (Blueprint $table) {
            $table->id();
            $table->string('id_karyawan');
            $table->string('gol_darah');
            $table->string('tanggal_mcu');
            $table->string('status');
            $table->string('verifikator');
            $table->string('riwayat_rokok')->enum('Ya', 'Tidak');
            $table->string('BB')->nullable();
            $table->string('TB')->nullable();
            $table->string('LP')->nullable();
            $table->string('Laseq')->nullable();
            $table->string('reqtal_touche')->nullable();
            $table->string('sistol')->nullable();
            $table->string('diastol')->nullable();
            $table->string('OD_jauh')->nullable();
            $table->string('OS_jauh')->nullable();
            $table->string('OD_dekat')->nullable();
            $table->string('OS_dekat')->nullable();
            $table->string('butawarna')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('mcu');
    }
};
