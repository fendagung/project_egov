<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Penduduk</h2>

        <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>NIK</label>
                <input type="text" name="nik" value="{{ $penduduk->nik }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $penduduk->nama }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $penduduk->alamat }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded">
                    <option {{ $penduduk->jenis_kelamin=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option {{ $penduduk->jenis_kelamin=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Agama</label>
                <select name="agama" class="w-full border p-2 rounded">
                    <option {{ $penduduk->agama=='Islam' ? 'selected' : '' }}>Islam</option>
                    <option {{ $penduduk->agama=='Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option {{ $penduduk->agama=='Katholik' ? 'selected' : '' }}>Katholik</option>
                    <option {{ $penduduk->agama=='Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option {{ $penduduk->agama=='Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option {{ $penduduk->agama=='Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
