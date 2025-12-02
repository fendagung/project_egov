<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Antrian;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalPenduduk' => Penduduk::count(),
            'totalAntrian' => Antrian::count(),
            'totalSelesai' => Antrian::where('status', 'Selesai')->count(),
        ]);
    }
}
