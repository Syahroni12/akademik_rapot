@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('cetak_pdf', auth()->user()->siswa->nisn) }}" class="btn btn-success mb-4">Cetak Raport</a>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="belum-tab" data-bs-toggle="tab" data-bs-target="#belum"
                                type="button" role="tab">Belum Dinilai</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sudah-tab" data-bs-toggle="tab" data-bs-target="#sudah"
                                type="button" role="tab">Sudah Dinilai</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content mt-3" id="myTabContent">
                {{-- Tab Mapel yang Belum Dinilai --}}
                <div class="tab-pane fade show active" id="belum" role="tabpanel">


                    @if ($mapel_belum->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Data Mapel Sudah Dinilai Secara Keseluruhan
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Mapel</th>
                                        <th scope="col">Mapel</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Semester</th>
                                        {{-- <th scope="col">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapel_belum as $item)
                                        <tr>
                                            <th scope="row">{{ $item->kd_mapel }}</th>
                                            <td>{{ $item->mapel }}</td>
                                            <td>{{ $item->kelas->kelas }}</td>
                                            <td>{{ $item->semester }}</td>



                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif



                </div>

                {{-- Tab Mapel yang Sudah Dinilai --}}
                <div class="tab-pane fade" id="sudah" role="tabpanel">
                    @if ($mapel_sudah->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Data Mapel yang sudah dinilai masih kosong
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Mapel</th>
                                        <th scope="col">Mapel</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapel_sudah as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id_mapel }}</th>
                                            <td>{{ $item->mapel->mapel }}</td>
                                            <td>{{ $item->detail_kelas->nama_kelas }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td> {{ $item->nilai_akhir }}</td>

                                            <td>
                                                <a href="{{ route('halaman_detail_nilai', $item->id) }}"
                                                    class="btn btn-primary">Detail Nilai</a>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
