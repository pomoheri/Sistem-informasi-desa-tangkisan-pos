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
                <p class="text-decoration-underline fw-bold">SURAT KETERANGAN KELAHIRAN</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Yang bertanda tangan dibawah ini Kepala Desa Tangkisan Pos Kecamatan Jogonalan Kabupaten Klaten</p>
            </td>
        </tr>
        <tr>
            <td>Dengan ini menerangkan bahwa telah lahir bayi dengan biodata sebagai berikut :</td>
        </tr>
        <tr>
            <ul>
                <li>Nama : {{ $kelahiran->nama_bayi }}</li>
            </ul>
            <ul>
                <li>Tempat Lahir : {{ $kelahiran->tempat_lahir }}</li>
            </ul>
            <ul>
                <li>Tgl Lahir : {{ \Carbon\Carbon::parse($kelahiran->tgl_lahir)->format('d/m/Y') }}</li>
            </ul>
            <ul>
                <li>Jenis Kelamin : {{ ($kelahiran->jenkel == 'L') ? 'Laki-laki' : 'Perempuan' }}</li>
            </ul>
        </tr>
        <tr>
            <td>Demikian surat keterangan kelahiran ini dibuat untuk dapat dipergunakan seperlunya</td>
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