<!DOCTYPE html>
<html>
<head>
    <title>Surat Kelahiran</title>
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
                <p class="text-decoration-underline fw-bold">SURAT KETERANGAN KEMATIAN</p>
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
                <li>Alamat : {{ $penduduk->alamat }}</li>
            </ul>
        </tr>
        <tr>
            <td>Adalah benar warga Desa Tangkisan Pos Kecamatan Jogonalan Kabupaten Klaten, yang telah meninggal dunia pada :</td>
        </tr>
        <tr>
            <ul>
                <li>Tanggal : {{ \Carbon\Carbon::parse($kematian->tgl_meninggal)->format('d/m/Y') }}</li>
            </ul>
            <ul>
                <li>Tempat Meninggal : {{ $kematian->tempat_meninggal }}</li>
            </ul>
            <ul>
                <li>Penyebab Meninggal : {{ $kematian->sebab }}</li>
            </ul>
        </tr>
        <tr>
            <td>Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya</td>
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