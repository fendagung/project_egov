@extends('layouts.app')
@section('title','Edit Penduduk')

@section('content')
<form action="{{ route('penduduk.update', $penduduk) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
  @csrf @method('PUT')
  <div>
    <label>NIK</label>
    <input name="nik" value="{{ old('nik', $penduduk->nik) }}" class="w-full p-2 border rounded">
  </div>
  <div>
    <label>Nama</label>
    <input name="nama" value="{{ old('nama', $penduduk->nama) }}" class="w-full p-2 border rounded">
  </div>
  <div>
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="w-full p-2 border rounded">
      <option {{ $penduduk->jenis_kelamin=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
      <option {{ $penduduk->jenis_kelamin=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
  </div>
  <div>
    <label>Tempat Lahir</label>
    <input name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" class="w-full p-2 border rounded">
  </div>
  <div>
    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir?->format('Y-m-d')) }}" class="w-full p-2 border rounded">
  </div>
  <div class="md:col-span-2">
    <label>Alamat</label>
    <textarea name="alamat" class="w-full p-2 border rounded">{{ old('alamat', $penduduk->alamat) }}</textarea>
  </div>
  <div class="md:col-span-2">
    <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    <a href="{{ route('penduduk.index') }}" class="ml-2 px-4 py-2 border rounded">Batal</a>
  </div>
</form>
@endsection
