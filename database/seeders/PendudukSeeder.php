<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        Penduduk::create([
            'nik'=>'1234567890123456',
            'nama'=>'Nurlatifah',
            'jenis_kelamin'=>'Perempuan',
            'alamat'=>'Dusun 1 RT 01 RW 01',
        ]);

        Penduduk::create([
            'nik'=>'2234567890123456',
            'nama'=>'Fenditus Agung',
            'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Dusun 1 RT 01 RW 01',
        ]);

        Penduduk::create([
            'nik'=>'3234567890123456',
            'nama'=>'Muchammad Rofky',
            'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Dusun 1 RT 01 RW 01',
        ]);
    }
}
