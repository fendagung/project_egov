<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Antrian;

class AntrianSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $jenis = $request->get('jenis');
        $q = $request->get('q');

        try {
            $data = Antrian::with('penduduk')
                ->when($jenis, function($query) use ($jenis) {
                    return $query->where('jenis_surat', $jenis);
                })
                ->when($q, function($query) use ($q) {
                    return $query->whereHas('penduduk', function($subQuery) use ($q) {
                        $subQuery->where('nama', 'like', "%{$q}%");
                    });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString();

            return view('antrian.index', compact('data', 'jenis', 'q'));
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}