<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan (admins).
    protected $table = 'admin';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'password',
    ];

    // Kolom yang harus di-hash, biasanya untuk password
    protected $hidden = [
        'password',
    ];
}
