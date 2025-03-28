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
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('proveder')->nullable();
            $table->string('tanggal_mcu');
            $table->string('exp_mcu');
            $table->string('status');
            $table->string('verifikator');
            $table->enum('riwayat_rokok', ['Ya', 'Tidak']);
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
            $table->string('gdp')->nullable();
            $table->string('gd_2_jpp')->nullable();
            $table->string('ureum')->nullable();
            $table->string('creatine')->nullable();
            $table->string('asamurat')->nullable();
            $table->string('sgot')->nullable();
            $table->string('sgpt')->nullable();
            $table->string('hbsag')->nullable();
            $table->string('anti_hbs')->nullable();
            $table->string('kolesterol')->nullable();
            $table->string('hdl')->nullable();
            $table->string('ldl')->nullable();
            $table->string('tg')->nullable();
            $table->string('darah_rutin')->nullable();
            $table->string('napza')->nullable();
            $table->string('urin')->nullable();
            $table->string('ekg')->nullable();
            $table->string('rontgen')->nullable();
            $table->string('audiometri')->nullable();
            $table->string('spirometri')->nullable();
            $table->string('tredmil_test')->nullable();
            $table->string('widal_test')->nullable();
            $table->string('routin_feces')->nullable();
            $table->string('kultur_feces')->nullable();
            $table->enum('status_', ['open', 'close'])->default('open');
            $table->string('temuan')->nullable();
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
