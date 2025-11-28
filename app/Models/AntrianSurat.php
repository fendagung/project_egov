<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntrianSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_antrian',
        'nama_pemohon',
        'jenis_surat',
        'status'
    ];
}
