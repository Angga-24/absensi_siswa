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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn');
            $table->string('username');
            $table->string('password');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->text('alamat');
            $table->string('nama_wm');
            $table->string('nohp_wm');
            $table->enum('status', ['null','hadir', 'izin', 'sakit', 'alpa']);
            $table->foreignId('id_local')->references('id')->on('locals')->onDelete('cascade');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
