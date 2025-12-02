<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAntrianRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'penduduk_id' => 'required|exists:penduduk,id',
            'jenis_surat' => 'required|string',
            'keterangan' => 'nullable|string',
        ];
    }
}
