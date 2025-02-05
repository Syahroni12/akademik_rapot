@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('walikelas') }}" class="btn btn-danger mb-4">Kembali</a>


            <form >


                <div class="mb-3">
                    <label for="nip" class="form-label">NIP/NBM</label>
                    <input type="number" class="form-control" id="nip" aria-describedby="nip" name="nip"
                        value="{{ $data->nip }}" disabled>
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
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir"
                        name="tempat_lahir" value="{{ $data->tempat_lahir }}" disabled>
                </div>


                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir"
                        value="{{ $data->tgl_lahir }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Wali Kelas di Kelas</label>
                    <input type="text" name="" id="" value="{{ $data->kelas->kelas }}" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="Alamat" class="form-label">Alamat</label>
                   <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>{{ $data->alamat }}</textarea>
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
