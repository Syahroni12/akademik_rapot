@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('mapel') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('tambah_mapell') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kd_mapel" class="form-label">Kode Mapel</label>
                    <input type="text" class="form-control" id="kd_mapel" aria-describedby="kd_mapel" name="kd_mapel">
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 5 karakter!</small>

                </div>
                <div class="mb-3">
                    <label for="mapel" class="form-label">Mapel</label>
                    <input type="text" class="form-control" id="mapel" aria-describedby="mapel" name="mapel">

                </div>

                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kelas</label>
                    <select class="form-select" aria-label="Default select example" name="id_kelas">
                        <option selected>Pilih kelas</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        const inputField = document.getElementById("kd_mapel");
        const warningText = document.getElementById("warning-text");

        inputField.addEventListener("input", function() {
            if (this.value.length > 5) {
                this.value = this.value.slice(0, 5); // Potong karakter ke-6 dan setelahnya
                warningText.style.display = "block"; // Tampilkan peringatan
            } else {
                warningText.style.display = "none"; // Sembunyikan peringatan jika karakter <= 5
            }
        });
    </script>
@endsection
