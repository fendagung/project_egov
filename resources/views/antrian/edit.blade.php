@extends('layouts.app')
@section('title','Edit Antrian Surat')

@section('content')

<form action="{{ route('antrian.update', $antrian) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @csrf
    @method('PUT')

    {{-- PILIH PENDUDUK --}}
    <div>
        <label class="block font-semibold mb-1">Pilih Penduduk</label>
        <select name="penduduk_id" class="w-full p-2 border rounded">
            @foreach($penduduk as $p)
                <option value="{{ $p->id }}" {{ $p->id == $antrian->penduduk_id ? 'selected' : '' }}>
                    {{ $p->nama }} ({{ $p->nik }})
                </option>
            @endforeach
        </select>
        @error('penduduk_id')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- JENIS SURAT --}}
    <div>
        <label class="block font-semibold mb-1">Jenis Surat</label>
        <select name="jenis_surat" class="w-full p-2 border rounded">
            @foreach($jenisSurat as $key => $val)
                <option value="{{ $key }}" {{ $antrian->jenis_surat == $key ? 'selected' : '' }}>
                    {{ $val }}
                </option>
            @endforeach
        </select>
        @error('jenis_surat')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- KETERANGAN --}}
    <div class="md:col-span-2">
        <label class="block font-semibold mb-1">Keterangan (opsional)</label>
        <textarea name="keterangan" class="w-full p-2 border rounded" rows="3">{{ old('keterangan', $antrian->keterangan) }}</textarea>
        @error('keterangan')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- STATUS UPDATE --}}
    <div class="md:col-span-2">
        <label class="block font-semibold mb-1">Status Pengajuan</label>
        <select name="status" class="w-full p-2 border rounded">
            <option value="Menunggu" {{ $antrian->status == 'Menunggu' ? 'selected':'' }}>Menunggu</option>
            <option value="Diproses" {{ $antrian->status == 'Diproses' ? 'selected':'' }}>Diproses</option>
            <option value="Selesai" {{ $antrian->status == 'Selesai' ? 'selected':'' }}>Selesai</option>
        </select>
    </div>

    <div class="md:col-span-2 mt-3">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        <a href="{{ route('antrian.index') }}" class="ml-2 px-4 py-2 border rounded">Batal</a>
    </div>

</form>

@endsection
