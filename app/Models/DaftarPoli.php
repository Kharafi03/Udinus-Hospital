<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarPoli extends Model
{
    use HasFactory, SoftDeletes;

    // Menentukan nama tabel jika berbeda dengan konvensi penamaan
    protected $table = 'daftar_poli';

    // Menentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'id_pasien', 
        'id_jadwal', 
        'keluhan', 
        'no_antrian',
    ];

    /**
     * Relasi dengan model Pasien (One to Many)
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    /**
     * Relasi dengan model JadwalPraktik (One to Many)
     */
    public function jadwalPraktik()
    {
        return $this->belongsTo(JadwalPraktik::class, 'id_jadwal');
    }
}
