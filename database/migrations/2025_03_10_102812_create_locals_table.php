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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tingkat');
            $table->integer('kapasitas');
            $table->string('tahun_ajaran');
            $table->text('jadwal_mapel');
            $table->foreignId('id_guru')->references('id')->on('gurus')->onDelete('cascade');
            $table->foreignId('id_jurusan')->references('id')->on('jurusans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
