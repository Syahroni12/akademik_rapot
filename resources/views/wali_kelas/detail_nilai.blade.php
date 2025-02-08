@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            @if (auth()->user()->role == 'wali_kelas')

            <a href="{{  route('mapel_kelas', $data->id_siswa)  }}" class="btn btn-danger mb-4">Kembali</a>
            @else
                <a href="{{  route('mapelku')  }}" class="btn btn-danger">Kembali</a>
            @endif





                {{-- buatkan inputan berupa hidden untuk mengirimkan nama siswa --}}

                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Siswa</label>

                    <input type="text" class="form-control" value="{{ $data->siswa->nama }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Nisn</label>

                    <input type="text" class="form-control" value="{{ $data->siswa->nisn }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Mapel</label>

                    <input type="text" class="form-control" value="{{ $data->mapel->mapel }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kode Mapel</label>

                    <input type="text" class="form-control" name="id_mapel" value="{{ $data->mapel->kd_mapel }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name="tahun_ajaran1" id="tahun_ajaran1" placeholder="2023" min="2000" max="2099" value="{{ $data->tahun_ajaran1 }}" disabled>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <span>/</span>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="tahun_ajaran2" id="tahun_ajaran2" placeholder="2024" min="2000" max="2099" value="{{ $data->tahun_ajaran2 }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>

                    <input type="text" class="form-control" name="semester" value="{{ $data->semester }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="nh" class="form-label">Nilai Harian</label>
                    <input type="text" class="form-control" name="nh" id="nh" oninput="hitungNilai()" pattern="^[0-9.]+$" placeholder="90.9" value="{{ $data->nh }}" disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="uts" class="form-label">Nilai UTS</label>
                    <input type="text" class="form-control" name="uts" id="uts" oninput="hitungNilai()" pattern="^[0-9.]+$" value="{{ $data->uts }}" disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="uas" class="form-label">Nilai uas</label>
                    <input type="text" class="form-control" name="uas" id="semester"  oninput="hitungNilai()" pattern="^[0-9.]+$" value="{{ $data->uas }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label for="nilai_akhir" class="form-label">Nilai Akhir</label>
                    <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir" value="{{ $data->nilai_akhir }}" disabled readonly>
                </div>
















                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Kompetensi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" disabled>{{ $data->deskripsi }}</textarea>

                </div>




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
