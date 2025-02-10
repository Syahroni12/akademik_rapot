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
            table-layout: fixed;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            word-wrap: break-word;
            white-space: normal;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        /* Page break jika kehadiran terlalu panjang */
        .page-break {
            page-break-before: always;
        }

        /* Tanda tangan selalu di halaman baru */
        .signature-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            position: relative;
        }

        .signature-left, .signature-right {
            flex: 1;
            text-align: center;
        }

        .signature-center {
            width: 100%;
            text-align: center;
            margin-top: 80px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2 style="text-align:center;">Laporan Hasil Belajar</h2>
        <h2 style="text-align:center;">(Rapor)</h2>

        <!-- Informasi Siswa -->
        <table style="border:none;">
            <tr>
                <td style="border:none; width:50%; vertical-align:top;">
                    <p><strong>Nama Peserta Didik:</strong> {{ $siswa->nama }}</p>
                    <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
                    <p><strong>Sekolah:</strong> SMP Muhammadiyah 1 Denpasar</p>
                    <p><strong>Alamat:</strong> {{ $siswa->tempat_lahir }}</p>
                </td>
                <td style="border:none; width:50%; vertical-align:top; text-align:right;">
                    <p><strong>Kelas:</strong> {{ $siswa->detail_kelas->nama_kelas }}</p>
                    <p><strong>Semester:</strong>
                        @if ($siswa->semester == 'ganjil') 1 "(satu)"
                        @else 2 "(dua)"
                        @endif
                    </p>
                    <p><strong>Tahun Pelajaran:</strong> {{ $tahun_ajaran }}</p>
                </td>
            </tr>
        </table>

        <h3>Penilaian Mata Pelajaran</h3>
        <table>
            <tr style="text-align: center">
                <th>No</th>
                <th>Muatan Pelajaran</th>
                <th>Nilai Akhir</th>
                <th>Capaian Kompetensi</th>
            </tr>
            @foreach ($mapel_sudah as $item)
            <tr style="text-align: center">
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td style="text-align: center">{{ $item->mapel->mapel }}</td>
                <td style="text-align: center">{{ $item->nilai_akhir }}</td>
                <td style="text-align: center">{{ $item->deskripsi }}</td>
            </tr>
            @endforeach
        </table>

        <h3>Ekstrakurikuler</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Ekstrakurikuler</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($pengikut_ekskul as $item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td style="text-align: center">{{ $item->ekskul->ekskul }}</td>
                <td style="text-align: center">{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </table>

        <!-- Kehadiran: jika banyak, otomatis pindah halaman -->
        <h3 class="page-break">Kehadiran</h3>
        <table style="width:50%;">
            <tr>
                <th>Jenis</th>
                <th>Hari</th>
            </tr>
            <tr>
                <td>Sakit</td>
                <td>{{ $kehadiran->sakit }}</td>
            </tr>
            <tr>
                <td>Izin</td>
                <td>{{ $kehadiran->izin }}</td>
            </tr>
            <tr>
                <td>Tanpa Keterangan</td>
                <td>{{ $kehadiran->alpha }}</td>
            </tr>
        </table>

        <!-- Tanda tangan di halaman baru -->
        {{-- <div class="page-break"></div> --}}
        <table style="border:none; width:100%;">
            <tr>
                <td style="border:none; text-align:center;">
                    <p><strong>Orang Tua</strong></p>
                    <br><br><br>
                    <p>(............................)</p>
                </td>
                <td style="border:none; text-align:center;">
                    <p>Denpasar, {{ date('d F Y') }}</p>
                    <p><strong>Wali Kelas</strong></p>
                    <br><br><br>
                    <p>(............................)</p>
                    <p>{{ $wali_kelas->nama }}</p>
                    <p>NBM: {{ $wali_kelas->nip }}</p>
                </td>
            </tr>
        </table>

        <div class="signature-center">
            <p><strong>Kepala Sekolah</strong></p>
            <br><br><br>
            <p>(............................)</p>
            <p>{{ $kepsek->nama }}</p>
            <p>NBM: {{ $kepsek->nip }}</p>
        </div>

    </div>
</body>

</html>
