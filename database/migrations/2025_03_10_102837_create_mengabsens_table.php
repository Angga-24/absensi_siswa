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
        Schema::create('mengabsens', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->enum('status', ['hadir', 'izin', 'alpa', 'sakit']);
            $table->text('keterangan')->nullable();
            $table->foreignId('id_guru')->references('id')->on('gurus')->onDelete('cascade');
            $table->foreignId('id_siswa')->references('id')->on('siswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengabsens');
    }
};
