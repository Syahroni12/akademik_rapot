@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('walikelas') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('update_walikelas',$data->nip) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP/NBM</label>
                    <input type="number" class="form-control" id="nip" aria-describedby="nip" name="nip" value="{{ $data->nip }}">
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 10 karakter!</small>

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Wali Kelas</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" value="{{ $data->nama }}">

                </div>
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
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="Jurusan" class="form-label">Kelas</label>
                    <select class="form-select" aria-label="Default select example" name="id_detail_kelas">
                        <option selected>Pilih kelas</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" @if ($data->id_detail_kelas == $item->id) selected @endif>{{ $item->nama_kelas }}</option>
                        @endforeach
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

@endsection
