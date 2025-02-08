@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('siswa') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('tambah_siswaa') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nisn" class="form-label">nisn</label>
                    <input type="number" class="form-control" id="nisn" aria-describedby="nisn" name="nisn" value="{{ old('nisn') }}">
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 10 karakter!</small>

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" value="{{ old('nama') }}">

                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Alamat</label>
                    <textarea name="tempat_lahir" id="" cols="30" rows="10" class="form-control">{{ old('tempat_lahir') }}</textarea>

                </div>

                <div class="mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" aria-describedby="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir">
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kelas</label>
                    <select class="form-select" aria-label="Default select example" name="id_detail_kelas">
                        <option selected>Pilih kelas</option>
                        @foreach ($detail_kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Semester</label>
                    <select class="form-select" aria-label="Default select example" name="semester">
                        <option selected>Pilih Semester</option>
                        <option value="ganjil">ganjil</option>
                        <option value="genap">genap</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" aria-label="Default select example" name="agama">
                        <option selected>Pilih Agama</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="konghucu">Konghucu</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
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
