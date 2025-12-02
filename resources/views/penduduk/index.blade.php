@extends('layouts.admin')
@section('title','Data Penduduk')

@section('content')

<div class="flex justify-between items-center mb-4">
  <form method="GET" class="flex gap-2">
    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari nama atau NIK" class="p-2 border rounded">
    <button class="px-3 py-2 bg-gray-800 text-white rounded">Cari</button>
  </form>

  <a href="{{ route('penduduk.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah</a>
</div>

<table class="w-full table-auto">
  <thead>
    <tr class="bg-gray-50 text-left">
      <th class="p-3">NIK</th><th class="p-3">Nama</th><th class="p-3">Jenis Kelamin</th><th class="p-3">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($data as $p)
      <tr class="border-b">
        <td class="p-3">{{ $p->nik }}</td>
        <td class="p-3">{{ $p->nama }}</td>
        <td class="p-3">{{ $p->jenis_kelamin }}</td>
        <td class="p-3">
          <a href="{{ route('penduduk.edit', $p) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

          <form action="{{ route('penduduk.destroy', $p) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
            @csrf @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
          </form>

        </td>
      </tr>
    @empty
      <tr><td class="p-3" colspan="4">Tidak ada data.</td></tr>
    @endforelse
  </tbody>
</table>

<div class="mt-4">
  {{ $data->links() }}
</div>

@endsection
