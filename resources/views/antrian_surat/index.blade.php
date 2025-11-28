<h2>Daftar Antrian Surat</h2>

<a href="/antrian-surat/create">+ Tambah Antrian</a>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>No Antrian</th>
        <th>Nama Pemohon</th>
        <th>Jenis Surat</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach ($antrian as $a)
    <tr>
        <td>{{ $a->nomor_antrian }}</td>
        <td>{{ $a->nama_pemohon }}</td>
        <td>{{ $a->jenis_surat }}</td>
        <td>{{ $a->status }}</td>
        <td>
            <a href="/antrian-surat/{{ $a->id }}/edit">Edit</a>

            <form action="/antrian-surat/{{ $a->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
