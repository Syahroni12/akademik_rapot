@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('kelas') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('tambah_kelass') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" aria-describedby="kelas" name="kelas">

                </div>

                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" aria-label="Default select example" name="id_jurusan">
                        <option selected>Pilih Jurusan</option>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
