<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    protected $fillable = ['nama', 'tingkat', 'kapasitas', 'tahun_ajaran', 'id_guru', 'id_jurusan'];

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->hasMany(siswa::class, 'id_local');
    }

    // Relasi ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    // Relasi ke model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
}
