@extends('layouts.admin')
@section('title','Tambah Antrian Surat')

@section('content')

<form action="{{ route('antrian.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
  @csrf
  <div>
    <label>Penduduk</label>
    <select name="penduduk_id" class="w-full p-2 border rounded">
      @foreach($penduduk as $p)
        <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->nik }})</option>
      @endforeach
    </select>
  </div>

  <div>
    <label>Jenis Surat</label>
    <select name="jenis_surat" class="w-full p-2 border rounded">
      @foreach($jenisSurat as $k => $v)
        <option value="{{ $k }}">{{ $v }}</option>
      @endforeach
    </select>
  </div>

  <div class="md:col-span-2">
    <label>Keterangan (opsional)</label>
    <textarea name="keterangan" class="w-full p-2 border rounded"></textarea>
  </div>

  <div class="md:col-span-2">
    <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    <a href="{{ route('antrian.index') }}" class="ml-2 px-4 py-2 border rounded">Batal</a>
  </div>
</form>

@endsection
