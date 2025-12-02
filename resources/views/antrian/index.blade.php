@extends('layouts.admin')

@section('title', 'Daftar Antrian Surat')

@section('content')

<div class="flex justify-between mb-4">
  <form method="GET" class="flex gap-2">
    <select name="jenis" class="p-2 border rounded">
      <option value="">Semua Jenis</option>
      <option value="SKTM" {{ request('jenis')=='SKTM' ? 'selected' : '' }}>SKTM</option>
      <option value="Domisili" {{ request('jenis')=='Domisili' ? 'selected' : '' }}>Domisili</option>
      <option value="SKU" {{ request('jenis')=='SKU' ? 'selected' : '' }}>SKU</option>
      <option value="Pengantar" {{ request('jenis')=='Pengantar' ? 'selected' : '' }}>Pengantar</option>
    </select>

    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari nama" class="p-2 border rounded">
    <button class="px-3 py-2 bg-gray-800 text-white rounded">Filter</button>
  </form>

  <a href="{{ route('antrian.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Antrian</a>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-sm">
    <thead>
      <tr class="bg-gray-50 text-left">
        <th class="p-3">Nama</th>
        <th class="p-3">Jenis Surat</th>
        <th class="p-3">Status</th>
        <th class="p-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $d)
        <tr class="border-b hover:bg-gray-50">
          <td class="p-3">{{ $d->penduduk->nama ?? '-' }}</td>
          <td class="p-3">{{ $d->jenis_surat }}</td>
          <td class="p-3">
            <span class="px-3 py-1 rounded text-white 
              {{ $d->status=='Menunggu' ? 'bg-yellow-600' : ($d->status=='Diproses' ? 'bg-blue-600' : 'bg-green-600') }}">
              {{ $d->status }}
            </span>
          </td>
          <td class="p-3 flex flex-wrap gap-2">
              
            <a href="{{ route('antrian.edit', $d) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

            <form action="{{ route('antrian.destroy', $d) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button class="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
            </form>

            <form action="{{ route('antrian.status.update', $d) }}" method="POST">
              @csrf
              <select name="status" onchange="this.form.submit()" class="p-1 border rounded">
                <option {{ $d->status=='Menunggu' ? 'selected':'' }}>Menunggu</option>
                <option {{ $d->status=='Diproses' ? 'selected':'' }}>Diproses</option>
                <option {{ $d->status=='Selesai' ? 'selected':'' }}>Selesai</option>
              </select>
            </form>

            @if($d->jenis_surat=='SKTM')
              <a href="{{ route('antrian.cetak.sktm', $d) }}" target="_blank" class="px-3 py-1 bg-green-600 text-white rounded">Cetak</a>
            @endif

          </td>
        </tr>
      @empty
        <tr>
          <td class="p-3" colspan="4">Kosong</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">
  {{ $data->links() }}
</div>

@endsection
