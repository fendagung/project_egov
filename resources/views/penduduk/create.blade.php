@extends('layouts.admin')
@section('title','Tambah Penduduk')

@section('content')
<form action="{{ route('penduduk.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
  @csrf
  <div>
    <label class="block">NIK</label>
    <input type="text" name="nik" value="{{ old('nik') }}" class="w-full p-2 border rounded">
    @error('nik') <div class="text-red-600">{{ $message }}</div> @enderror
  </div>

  <div>
    <label class="block">Nama</label>
    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full p-2 border rounded">
    @error('nama') <div class="text-red-600">{{ $message }}</div> @enderror
  </div>

  <div>
    <label class="block">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="w-full p-2 border rounded">
      <option value="">-- Pilih --</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>

  <div>
    <label class="block">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full p-2 border rounded">
  </div>

  <div>
    <label class="block">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full p-2 border rounded">
  </div>

  <div class="md:col-span-2">
    <label class="block">Alamat</label>
    <textarea name="alamat" class="w-full p-2 border rounded">{{ old('alamat') }}</textarea>
  </div>

  <div class="md:col-span-2">
    <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    <a href="{{ route('penduduk.index') }}" class="ml-2 px-4 py-2 border rounded">Batal</a>
  </div>
</form>
@endsection
