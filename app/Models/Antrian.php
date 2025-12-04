<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    // Tabel yang digunakan
    protected $table = 'antrian_surat';

    // Kolom yang boleh diisi massal
    protected $fillable = [
        'penduduk_id',
        'jenis_surat',
        'status',
        'keterangan',
    ];

    // Relasi ke Penduduk
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
