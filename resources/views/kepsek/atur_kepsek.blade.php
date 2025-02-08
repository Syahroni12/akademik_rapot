@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('walikelas') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('update_kepsek',$data->nip) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP/NBM</label>
                    <input type="number" class="form-control" id="nip" aria-describedby="nip" name="nip" value="{{ $data->nip }}">
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 10 karakter!</small>

                </div>
                <input type="hidden" name="nip" value="{{ $data->nip }}">
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" @if ($data->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-laki</option>

                        <option value="Perempuan" @if ($data->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                        {{-- <option value="Perempuan">Perempuan</option> --}}
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $data->alamat }}</textarea>
                </div>





                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
