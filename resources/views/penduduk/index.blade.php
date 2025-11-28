<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Data Penduduk</h2>

        <a href="{{ route('penduduk.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Penduduk
        </a>

        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-3">NIK</th>
                    <th class="py-2 px-3">Nama</th>
                    <th class="py-2 px-3">Alamat</th>
                    <th class="py-2 px-3">JK</th>
                    <th class="py-2 px-3">Agama</th>
                    <th class="py-2 px-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr class="border-b">
                    <td class="py-2 px-3">{{ $row->nik }}</td>
                    <td class="py-2 px-3">{{ $row->nama }}</td>
                    <td class="py-2 px-3">{{ $row->alamat }}</td>
                    <td class="py-2 px-3">{{ $row->jenis_kelamin }}</td>
                    <td class="py-2 px-3">{{ $row->agama }}</td>
                    <td class="py-2 px-3">
                        <a href="{{ route('penduduk.edit', $row->id) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('penduduk.destroy', $row->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus data?')" class="text-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
