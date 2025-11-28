<h2>Tambah Antrian Surat</h2>

<form action="/antrian-surat" method="POST">
    @csrf

    <label>Nomor Antrian</label>
    <input type="text" name="nomor_antrian"><br>

    <label>Nama Pemohon</label>
    <input type="text" name="nama_pemohon"><br>

    <label>Jenis Surat</label>
    <select name="jenis_surat">
        <option value="SKTM">SKTM</option>
        <option value="Domisili">Domisili</option>
        <option value="Keterangan Usaha">Keterangan Usaha</option>
    </select><br>

    <label>Status</label>
    <select name="status">
        <option value="menunggu">Menunggu</option>
        <option value="diproses">Diproses</option>
        <option value="selesai">Selesai</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
