@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('walikelas') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('tambah_walikelass') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP/NBM</label>
                    <input type="number" class="form-control" id="nip" aria-describedby="nip" name="nip" value="{{ old('nip') }}">
                    <small id="warning-text" class="text-danger" style="display: none;">Maksimal 10 karakter!</small>

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Wali Kelas</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" value="{{ old('nama') }}">

                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" @if (old('jenis_kelamin') == 'Laki-Laki') selected @endif>Laki-laki</option>

                        <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                        {{-- <option value="Perempuan">Perempuan</option> --}}
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ old('alamat') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir">
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

@endsection
