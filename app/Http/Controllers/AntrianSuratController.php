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

    // INDEX
    public function index(Request $request)
    {
        $jenis = $request->get('jenis');
        $q = $request->get('q');

        try {
            $data = Antrian::with('penduduk')
                ->when($jenis, fn($query) => $query->where('jenis_surat', $jenis))
                ->when($q, fn($query) =>
                    $query->whereHas('penduduk', fn($q2) =>
                        $q2->where('nama', 'like', "%{$q}%")
                    )
                )
                ->orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString();

            return view('antrian.index', compact('data', 'jenis', 'q'));

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // CREATE
    public function create()
    {
        $penduduk = Penduduk::orderBy('nama')->get();

        $jenisSurat = [
            'SKTM' => 'Surat Keterangan Tidak Mampu',
            'Domisili' => 'Surat Domisili',
            'SKU' => 'Surat Keterangan Usaha',
            'Pengantar' => 'Surat Pengantar'
        ];

        return view('antrian.create', compact('penduduk', 'jenisSurat'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'jenis_surat' => 'required',
            'keterangan'  => 'nullable'
        ]);

        Antrian::create([
            'penduduk_id' => $request->penduduk_id,
            'jenis_surat' => $request->jenis_surat,
            'status'      => 'Menunggu',
            'keterangan'  => $request->keterangan
        ]);

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil ditambahkan!');
    }

    // EDIT
    public function edit(Antrian $antrian)
    {
        $penduduk = Penduduk::orderBy('nama')->get();

        $jenisSurat = [
            'SKTM' => 'Surat Keterangan Tidak Mampu',
            'Domisili' => 'Surat Domisili',
            'SKU' => 'Surat Keterangan Usaha',
            'Pengantar' => 'Surat Pengantar'
        ];

        return view('antrian.edit', compact('antrian', 'penduduk', 'jenisSurat'));
    }

    // UPDATE
    public function update(Request $request, Antrian $antrian)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'jenis_surat' => 'required',
            'keterangan'  => 'nullable'
        ]);

        $antrian->update($request->all());

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Antrian $antrian)
    {
        $antrian->delete();

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dihapus!');
    }

    // UPDATE STATUS
    public function updateStatus(Request $request, Antrian $antrian)
    {
        $antrian->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status berhasil diperbarui!');
    }

    // CETAK SKTM
    public function cetakSKTM(Antrian $antrian)
    {
        $penduduk = $antrian->penduduk;

        return view('surat.sktm', compact('penduduk', 'antrian'));
    }
}
