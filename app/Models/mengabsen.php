<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mengabsen extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'status',
        'keterangan',
        'id_guru',
        'id_siswa'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
