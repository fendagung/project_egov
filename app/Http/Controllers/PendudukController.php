<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendudukRequest;

class PendudukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // sesuaikan
    }

    public function index(Request $request)
    {
        $q = $request->get('q');
        $data = Penduduk::when($q, function($qry) use ($q) {
                    $qry->where('nama', 'like', "%$q%")
                        ->orWhere('nik', 'like', "%$q%");
                })
                ->orderBy('created_at','desc')
                ->paginate(12)
                ->withQueryString();

        return view('penduduk.index', compact('data', 'q'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(StorePendudukRequest $request)
    {
        Penduduk::create($request->validated());
        return redirect()->route('penduduk.index')->with('success','Penduduk berhasil ditambahkan.');
    }

    public function edit(Penduduk $penduduk)
    {
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(StorePendudukRequest $request, Penduduk $penduduk)
    {
        $penduduk->update($request->validated());
        return redirect()->route('penduduk.index')->with('success','Data penduduk diperbarui.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success','Data penduduk dihapus.');
    }
}
