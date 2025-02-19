@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('kelas_hadir') }}" class="btn btn-danger mb-4">Kembali</a>


            <form action="{{ route('simpan_absen') }}" method="POST">
                @csrf





                <div class="mb-3">
                    <label for="sakit" class="form-label">Jumlah Izin Sakit</label>
                    <input type="number" name="sakit" class="form-control" id="sakit" value="{{ old('sakit') }}">


                </div>
                <div class="mb-3">
                    <label for="izin" class="form-label">Jumlah Izin </label>
                    <input type="number" name="izin" class="form-control" id="izin" value="{{ old('izin') }}">


                </div>
                <div class="mb-3">
                    <label for="alpha" class="form-label">Tanpa Keterangan</label>
                    <input type="number" name="alpha" class="form-control" id="alpha" value="{{ old('alpha') }}">


                </div>
                <input type="hidden" name="id_siswa" value="{{ $siswa->nisn }}">


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
