<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian_surat';  // WAJIB SAMA DENGAN NAMA TABEL

    protected $fillable = [
        'penduduk_id',
        'jenis_surat',
        'status',
        'keterangan',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
