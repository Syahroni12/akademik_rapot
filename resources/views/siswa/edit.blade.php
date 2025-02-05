@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('siswa') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('update_siswa', $data->nisn) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nisn" class="form-label">nisn</label>
                    <input type="number" class="form-control" id="nisn" aria-describedby="nisn" name="nisn"
                        value="{{ $data->nisn }}">
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 10 karakter!</small>

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama"
                        value="{{ $data->nama }}">

                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" @if ($data->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if ($data->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir"
                        name="tempat_lahir" value="{{ $data->tempat_lahir }}">
                </div>

                <div class="mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" aria-describedby="tahun_masuk"
                        name="tahun_masuk" value="{{ $data->tahun_masuk }}">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir"
                        value="{{ $data->tgl_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kelas</label>
                    <select class="form-select" aria-label="Default select example" name="id_kelas">
                        <option selected>Pilih kelas</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" @if ($data->id_kelas == $item->id) selected @endif>
                                {{ $item->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Semester</label>
                    <select class="form-select" aria-label="Default select example" name="semester">
                        <option selected>Pilih Semester</option>
                        <option value="ganjil" @if ($data->semester == 'ganjil') selected @endif>ganjil</option>
                        <option value="genap" @if ($data->semester == 'genap') selected @endif>genap</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" aria-label="Default select example" name="agama">
                        <option selected>Pilih Agama</option>
                        <option value="islam" @if ($data->agama == 'islam') selected @endif>Islam</option>
                        <option value="kristen" @if ($data->agama == 'kristen') selected @endif>Kristen</option>
                        <option value="katolik" @if ($data->agama == 'katolik') selected @endif>Katolik</option>
                        <option value="hindu" @if ($data->agama == 'hindu') selected @endif>Hindu</option>

                        <option value="buddha" @if ($data->agama == 'buddha') selected @endif>Buddha</option>
                        <option value="konghucu" @if ($data->agama == 'konghucu') selected @endif>Konghucu</option>

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
