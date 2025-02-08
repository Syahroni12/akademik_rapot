@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('siswa') }}" class="btn btn-danger mb-4">Kembali</a>


            <form >


                <div class="mb-3">
                    <label for="nisn" class="form-label">nisn</label>
                    <input type="number" class="form-control" id="nisn" aria-describedby="nisn" name="nisn"
                        value="{{ $data->nisn }}" disabled>
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 10 karakter!</small>

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama"
                        value="{{ $data->nama }}" disabled>

                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                   <input type="text" name="" id="" value="{{ $data->jenis_kelamin }}" class="form-control" disabled>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Alamat</label>
                   <textarea name="" id="" cols="30" rows="10">{{ $data->tempat_lahir }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" aria-describedby="tahun_masuk"
                        name="tahun_masuk" value="{{ $data->tahun_masuk }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir"
                        value="{{ $data->tgl_lahir }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kelas</label>
                    <input type="text" name="" id="" value="{{ $data->detail_kelas->nama_kelas }}" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Semester</label>
                    <input type="text" name="" id="" value="{{ $data->semester }}" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" name="" id="" value="{{ $data->agama }}" class="form-control" disabled>
                </div>


            </form>
        </div>
    </div>
    <script>
        const inputField = document.getElementById("nisn");
        const warningText = document.getElementById("warning-text");

        inputField.addEventListener("input", function() {
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10); // Potong karakter ke-6 dan setelahnya
                warningText.style.display = "block"; // Tampilkan peringatan
            } else {
                warningText.style.display = "none"; // Sembunyikan peringatan jika karakter <= 5
            }
        });
    </script>
@endsection
