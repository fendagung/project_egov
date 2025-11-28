<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Penduduk</h2>

        <form action="{{ route('penduduk.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label>NIK</label>
                <input type="text" name="nik" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Agama</label>
                <select name="agama" class="w-full border p-2 rounded">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Katholik</option>
                    <option>Hindu</option>
                    <option>Buddha</option>
                    <option>Konghucu</option>
                </select>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
