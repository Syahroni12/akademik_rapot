@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">





            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Tahun Masuk</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->nisn }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->detail_kelas->nama_kelas }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->tahun_masuk }}</td>

                                <td> <a href="{{ route('absen', $item->nisn) }}" class="btn btn-primary">Absen</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>






    <!-- Modal -->





@endsection
