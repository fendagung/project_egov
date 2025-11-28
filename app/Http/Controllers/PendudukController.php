<?php

class PendudukController extends Controller
{
    public function index() {
        $data = Penduduk::all();
        return view('penduduk.index', compact('data'));
    }

    public function create() {
        return view('penduduk.create');
    }

    public function store(Request $req) {
        $req->validate([
            'nik' => 'required|unique:penduduk',
            'nama' => 'required'
        ]);
        Penduduk::create($req->all());
        return redirect()->route('penduduk.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id) {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $req, $id) {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($req->all());
        return redirect()->route('penduduk.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id) {
        Penduduk::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
