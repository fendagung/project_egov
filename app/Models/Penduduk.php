<?php

class Penduduk extends Model
{
    protected $table = "penduduk";
    protected $fillable = [
        'nik', 'nama', 'alamat', 'jenis_kelamin', 'agama', 'telepon'
    ];
}
