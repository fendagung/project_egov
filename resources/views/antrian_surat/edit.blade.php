<h2>Edit Antrian Surat</h2>

<form action="/antrian-surat/{{ $antrian->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nomor Antrian</label>
    <input type="text" name="nomor_antrian" value="{{ $antrian->nomor_antrian }}"><br>

    <label>Nama Pemohon</label>
    <input type="text" name="nama_pemohon" value="{{ $antrian->nama_pemohon }}"><br>

    <label>Jenis Surat</label>
    <select name="jenis_surat">
        <option value="SKTM" {{ $antrian->jenis_surat == 'SKTM' ? 'selected' : '' }}>SKTM</option>
        <option value="Domisili" {{ $antrian->jenis_surat == 'Domisili' ? 'selected' : '' }}>Domisili</option>
        <option value="Keterangan Usaha" {{ $antrian->jenis_surat == 'Keterangan Usaha' ? 'selected' : '' }}>Keterangan Usaha</option>
    </select><br>

    <label>Status</label>
    <select name="status">
        <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
        <option value="diproses" {{ $antrian->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
        <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>
