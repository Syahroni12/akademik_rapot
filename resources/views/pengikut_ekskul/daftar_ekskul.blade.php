@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('pengikut_ekskul') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('store_daftarekskul') }}" method="POST">
                @csrf




                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Ekstrakulikuler</label>
                    <select class="form-select" aria-label="Default select example" name="id_ekskul">
                        <option selected>Pilih Ekskul</option>
                        @foreach ($ekskuls as $item)
                            <option value="{{ $item->id }}">{{ $item->ekskul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                  <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>

                </div>
                <input type="hidden" name="id_siswa" value="{{ $siswa->nisn }}">


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
