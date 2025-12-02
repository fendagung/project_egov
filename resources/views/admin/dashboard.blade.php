@extends('layouts.admin')
@section('title','Dashboard Admin')

@section('content')
<div class="grid grid-cols-3 gap-4">
    <div class="p-4 bg-blue-500 text-white rounded">
        Total Penduduk: {{ $totalPenduduk }}
    </div>
    <div class="p-4 bg-yellow-600 text-white rounded">
        Total Antrian: {{ $totalAntrian }}
    </div>
    <div class="p-4 bg-green-600 text-white rounded">
        Surat Selesai: {{ $totalSelesai }}
    </div>
</div>
@endsection
