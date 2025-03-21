<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nisn',
        'username',
        'password',
        'tanggal_lahir',
        'jk',
        'alamat',
        'nama_wm',
        'nohp_wm',
        'id_local',
        'id_user',
        'tanggal_absen'
    ];
    // Relasi ke model Local
    public function local()
    {
        return $this->belongsTo(local::class, 'id_local');
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
