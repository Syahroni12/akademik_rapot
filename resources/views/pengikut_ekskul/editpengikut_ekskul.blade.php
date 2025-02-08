@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('pengikut_ekskul') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('update_pengikut_ekskul', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- buatkan inputan berupa hidden untuk mengirimkan nama siswa --}}

                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Siswa</label>

                    <input type="text" class="form-control" value="{{ $data->siswa->nama }}" readonly disabled>
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kelas</label>

                    <input type="text" class="form-control" value="{{ $data->siswa->kelas->kelas }}" disabled>
                </div>




                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Ekstrakulikuler</label>
                    <select class="form-select" aria-label="Default select example" name="id_ekskul">
                        <option selected>Pilih Ekskul</option>
                        @foreach ($ekskuls as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $data->id_ekskul) selected @endif>
                                {{ $item->ekskul }}</option>
                        @endforeach
                    </select>
                </div>
<input type="hidden" name="id_siswa" value="{{ $data->id_siswa }}">

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $data->keterangan }}</textarea>

                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
