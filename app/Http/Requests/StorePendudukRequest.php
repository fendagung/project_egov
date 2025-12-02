<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendudukRequest extends FormRequest
{
    public function authorize()
    {
        return true; // sesuaikan jika perlu middleware
    }

    public function rules()
    {
        $rules = [
            'nik' => 'required|string|unique:penduduk,nik,' . ($this->penduduk? $this->penduduk->id : ''),
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
        ];

        return $rules;
    }
}
