@extends('templating.main')
@section('content')
    <div class="card">


        <div class="card-header">

            <h5 class="card-title">Wali Kelas {{ $wali_kelas->nama }}</h5>
        </div>

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
                            <th scope="col">Progres Penilaian</th>
                            {{-- <th scope="col">Aksi</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $item)
                            <tr>
                                <th scope="row">{{ $item->nisn }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->detail_kelas->nama_kelas }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->tahun_masuk }}</td>
                                <td>{{ $item->progres_penilaian }} %</td>



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
