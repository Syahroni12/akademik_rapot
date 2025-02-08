<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Belajar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
        .signature div {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align:center;">Laporan Hasil Belajar </h2>
        <h2 style="text-align:center;">(Rapor)</h2>
        <!-- Menggunakan tabel untuk membagi header -->
        <table style="border:none;">
            <tr>
                <td style="border:none; width:50%; vertical-align:top;">
                    <p><strong>Nama Peserta Didik:</strong> Jovan Ary Wijayanto</p>
                    <p><strong>NISN:</strong> 1234567890</p>
                    <p><strong>Sekolah:</strong> SMP Muhammadiyah 1 Denpasar</p>
                    <p><strong>Alamat:</strong> Jl. Contoh Alamat, Denpasar</p>
                </td>
                <td style="border:none; width:50%; vertical-align:top; text-align:right;">
                    <p><strong>Kelas      :</strong> VII A</p>
                    <p><strong>Semester    :</strong> Ganjil</p>
                    <p><strong>Tahun Pelajaran:</strong> 2023/2024</p>
                </td>
            </tr>
        </table>

        <h3>Penilaian Mata Pelajaran</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Muatan Pelajaran</th>
                <th>Nilai Akhir</th>
                <th>Capaian Kompetensi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Pendidikan Agama Islam</td>
                <td style="text-center">80</td>
                <td>Memahami ketentuan shalat fardhu</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pancasila</td>
                <td>77</td>
                <td>Memahami nilai-nilai Pancasila</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Matematika</td>
                <td>33</td>
                <td>Memerlukan bimbingan dalam operasi hitung</td>
            </tr>
        </table>

        <h3>Ekstrakurikuler</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Ekstrakurikuler</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Hizbul Wathan</td>
                <td>Cukup mengenal dasar kepanduan</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tapak Suci</td>
                <td>Cukup baik dalam jurus dasar</td>
            </tr>
        </table>

        <h3>Kehadiran</h3>
        <table>
            <tr>
                <th>Jenis</th>
                <th>Hari</th>
            </tr>
            <tr>
                <td>Sakit</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Izin</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Tanpa Keterangan</td>
                <td>-</td>
            </tr>
        </table>

        <div class="signature">
            <div >
                <p>Orang Tua/Wali</p>
                <br><br><br>
                <p>(............................)</p>
            </div>
            <div>
                <p>Kepala Sekolah</p>
                <br><br><br>
                <p>(............................)</p>
            </div>
            <div>
                <p>Wali Kelas</p>
                <br><br><br>
                <p>(............................)</p>
            </div>
        </div>
    </div>
</body>
</html>
