<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Surat Keterangan Tidak Mampu</title>
  <style>
    body { font-family: "Times New Roman", serif; font-size:14px; }
    .center { text-align:center; }
    .right { text-align:right; }
    .mt-1 { margin-top:1rem; }
    table { width:100%; }
  </style>
</head>
<body>
  <div class="center">
    <h2>SURAT KETERANGAN TIDAK MAMPU</h2>
    <p>Nomor: 470/ - /{{ date('Y') }}</p>
  </div>

  <p>Yang bertanda tangan di bawah ini menerangkan bahwa :</p>

  <table>
    <tr><td style="width:150px">Nama</td><td>: {{ $penduduk->nama }}</td></tr>
    <tr><td>NIK</td><td>: {{ $penduduk->nik }}</td></tr>
    <tr><td>Alamat</td><td>: {{ $penduduk->alamat }}</td></tr>
  </table>

  <p style="text-indent:45px" class="mt-1">
    Bahwa nama tersebut di atas adalah benar seorang warga yang tergolong <b>tidak mampu secara ekonomi</b>.
    Surat ini dibuat untuk dipergunakan sebagaimana mestinya.
  </p>

  <div class="right mt-1">
    <p>{{ now()->format('d F Y') }}</p>
    <p>Ketua RT/RW</p>
    <br><br>
    <p>________________________</p>
  </div>
</body>
</html>
