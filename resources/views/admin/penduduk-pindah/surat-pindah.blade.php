<!DOCTYPE html>
<html>
<head>
    <title>Surat keterangan domisili</title>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="50" align="center">
                <h2>PEMERINTAH KABUPATEN KLATEN</h2>
                <h2>KECAMATAN JOGONALAN</h2>
                <h2>DESA TANGKISAN POS</h2>
            </td>
        </tr>
    </table>
    <hr>
    <table width="100%">
        <tr>
            <td width="100" align="center">
                <p class="text-decoration-underline fw-bold">SURAT PENGANTAR PINDAH DOMISILI</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Yang bertanda tangan dibawah ini Kepala Desa Tangkisan Pos Kecamatan Jogonalan Kabupaten Klaten</p>
            </td>
        </tr>
        <tr>
            <td>Dengan ini menerangkan bahwa :</td>
        </tr>
        <tr>
            <ul>
                <li>Nama : {{ $penduduk->nama }}</li>
            </ul>
            <ul>
                <li>Tempat Lahir : {{ $penduduk->tempat_lahir }}</li>
            </ul>
            <ul>
                <li>Tgl Lahir : {{ \Carbon\Carbon::parse($penduduk->tgl_lahir)->format('d/m/Y') }}</li>
            </ul>
            <ul>
                <li>Jenis Kelamin : {{ ($penduduk->jenkel == 'L') ? 'Laki-laki' : 'Perempuan' }}</li>
            </ul>
            <ul>
                <li>Agama : {{ $penduduk->agama }}</li>
            </ul>
            <ul>
                <li>Alamat Asal : RT {{ $penduduk_pindah->rt_asal }}/RW {{ $penduduk_pindah->rw_asal }}, Desa Tangkisan Pos, Kecamatan Jogonalan</li>
            </ul>
        </tr>
        <tr>
            <td>Adalah benar warga kami di lingkungan RT {{ $penduduk_pindah->rt_tujuan }}/RW {{ $penduduk_pindah->rw_tujuan }} Desa Tangkisan Pos Kecamatan Jogonalan Kabupaten Klaten, yang pindah ke :</td>
        </tr>
        <tr>
            <ul>
                <li>Desa Tujuan : {{ $penduduk_pindah->desa_tujuan }}</li>
            </ul>
            <ul>
                <li>Kecamatan Tujuan : {{ $penduduk_pindah->kecamatan_tujuan }}</li>
            </ul>
            <ul>
                <li>Kabupaten Tujuan : {{ $penduduk_pindah->kabupaten_tujuan }}</li>
            </ul>
        </tr>
        <tr>
            <td>Demikian surat keterangan domisili ini dibuat untuk dipergunakan sebagaimana mestinya</td>
        </tr>
        <tr>
            <br>
            <br>
        </tr>
        <tr>
            <td align="right">
                Klaten, {{ \Carbon\Carbon::parse(now())->format('d/m/Y') }}
            </td>
        </tr>
        <tr>
            <td align="right">
                Kepala Desa Tangkisan Pos
            </td>
        </tr>
        <tr>
            <br>
            <br>
            <br>
        </tr>
        <tr>
            <td align="right">
                Pomo Heri Santoso
            </td>
        </tr>
    </table>
</body>
</html>