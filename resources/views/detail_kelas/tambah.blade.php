@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('detail_kelas') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('tambah_detail_kelass') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="Nama_kelas" aria-describedby="kelas" name="nama_kelas">

                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">kelas</label>
                    <select class="form-select" aria-label="Default select example" name="id_kelas">
                        <option selected>Pilih kelas</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
