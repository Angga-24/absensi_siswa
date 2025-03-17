<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $fillable = [
        'nama',
        'nohp',
        'mata_pelajaran',
        'nip',
        'username',
        'password',
        'alamat',
        'id_level'
    ];
}
