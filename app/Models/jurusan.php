<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $fillable = ['nama', 'kepala_jurusan'];

    // Relasi ke model Local
    public function locals()
    {
        return $this->hasMany(Local::class, 'id_jurusan');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
