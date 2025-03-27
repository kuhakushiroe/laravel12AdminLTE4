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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->sting('foto')->nullable();
            $table->string('nik')->unique();
            $table->string('nrp')->unique();
            $table->date('tgl_lahir');
            $table->string('nama');
            $table->string('jenis_kelamin')->enum('laki-laki', 'perempuan');
            $table->string('tempat_lahir');
            $table->string('agama')->enum('Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu');
            $table->string('gol_darah')->enum('A', 'B', 'AB', 'O');
            $table->string('status_perkawinan')->enum('menikah', 'belum menikah');
            $table->string('perusahaan');
            $table->string('kontraktor');
            $table->string('dept');
            $table->string('jabatan');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('domisili')->enum('lokal', 'non lokal');
            $table->string('status')->enum('aktif', 'non aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('karyawans');
    }
};
