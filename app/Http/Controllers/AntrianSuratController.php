<?php

namespace App\Http\Controllers;

use App\Models\AntrianSurat;
use Illuminate\Http\Request;

class AntrianSuratController extends Controller
{
    public function index()
    {
        $antrian = AntrianSurat::all();
        return view('antrian_surat.index', compact('antrian'));
    }

    public function create()
    {
        return view('antrian_surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_antrian' => 'required|unique:antrian_surats',
            'nama_pemohon'  => 'required',
            'jenis_surat'   => 'required',
            'status'        => 'required',
        ]);

        AntrianSurat::create($request->all());

        return redirect('/antrian-surat')->with('success', 'Antrian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $antrian = AntrianSurat::findOrFail($id);
        return view('antrian_surat.edit', compact('antrian'));
    }

    public function update(Request $request, $id)
    {
        $antrian = AntrianSurat::findOrFail($id);

        $request->validate([
            'nomor_antrian' => 'required|unique:antrian_surats,nomor_antrian,' . $antrian->id,
            'nama_pemohon'  => 'required',
            'jenis_surat'   => 'required',
            'status'        => 'required',
        ]);

        $antrian->update($request->all());

        return redirect('/antrian-surat')->with('success', 'Data antrian berhasil diupdate');
    }

    public function destroy($id)
    {
        AntrianSurat::destroy($id);

        return redirect('/antrian-surat')->with('success', 'Data antrian berhasil dihapus');
    }
}
