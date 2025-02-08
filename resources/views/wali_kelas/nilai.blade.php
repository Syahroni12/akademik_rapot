@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
        <a href="{{  route('mapel_kelas', $siswa->nisn)  }}" class="btn btn-danger mb-4">Kembali</a>


            <form action=" {{ route('simpan_nilai') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}

                {{-- buatkan inputan berupa hidden untuk mengirimkan nama siswa --}}

                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Siswa</label>

                    <input type="text" class="form-control" value="{{ $siswa->nama }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Nisn</label>

                    <input type="text" class="form-control" name="id_siswa" value="{{ $siswa->nisn }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Mapel</label>

                    <input type="text" class="form-control" value="{{ $mapel->mapel }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kode Mapel</label>

                    <input type="text" class="form-control" name="id_mapel" value="{{ $mapel->kd_mapel }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name="tahun_ajaran1" id="tahun_ajaran1" placeholder="2023" min="2000" max="2099">
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <span>/</span>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="tahun_ajaran2" id="tahun_ajaran2" placeholder="2024" min="2000" max="2099">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>

                    <input type="text" class="form-control" name="semester" value="{{ $siswa->semester }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nh" class="form-label">Nilai Harian</label>
                    <input type="text" class="form-control" name="nh" id="nh" oninput="hitungNilai()" pattern="^[0-9.]+$" placeholder="90.9">
                </div>

                <div class="mb-3">
                    <label for="uts" class="form-label">Nilai UTS</label>
                    <input type="text" class="form-control" name="uts" id="uts" oninput="hitungNilai()" pattern="^[0-9.]+$">
                </div>

                <div class="mb-3">
                    <label for="uas" class="form-label">Nilai uas</label>
                    <input type="text" class="form-control" name="uas" id="semester" value="" oninput="hitungNilai()" pattern="^[0-9.]+$">
                </div>

                <div class="mb-3">
                    <label for="nilai_akhir" class="form-label">Nilai Akhir</label>
                    <input type="text" class="form-control" id="nilai_akhir" readonly>
                </div>
















                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Kompetensi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>

                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    <script>
        function hitungNilai() {
            // Ambil nilai input
            let nh = document.getElementById('nh').value.replace(',', '.'); // Ganti koma dengan titik
            let uts = document.getElementById('uts').value.replace(',', '.');
            let semester = document.getElementById('semester').value.replace(',', '.');

            // Ubah ke float (jika kosong, dianggap 0)
            nh = parseFloat(nh) || 0;
            uts = parseFloat(uts) || 0;
            semester = parseFloat(semester) || 0;

            // Hitung rata-rata
            let nilaiAkhir = (nh + uts + semester) / 3;

            // Tampilkan hasil di input nilai akhir
            document.getElementById('nilai_akhir').value = nilaiAkhir.toFixed(2);
        }
    </script>
@endsection
