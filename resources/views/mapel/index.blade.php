@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">


            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="float-right">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="cari"
                                    value="{{ request()->cari }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        {{-- <i class="fas fa-search"></i> --}}
                                        Cari
                                    </button>
                                    <button class="btn btn-secondary" type="button"
                                        onclick="window.location.href='{{ route('mapel') }}'">
                                        refresh
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           <a href="{{ route('tambah_mapel') }}" class="btn btn-primary">Tambah Mapel</a>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Mapel</th>
                            <th scope="col">Mapel</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->kd_mapel }}</th>
                                <td>{{ $item->mapel }}</td>
                                <td>{{ $item->kelas->kelas }}</td>
                                <td>{{ $item->semester }}</td>

                                <td> <a href="{{ route('edit_mapel',$item->kd_mapel) }}" class="btn btn-warning">Edit</a> |<button type="button" class="btn btn-danger m-1"
                                    onclick="hapus('{{ $item->kd_mapel }}')">Hapus</button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        </div>
    </div>







    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus Mapel ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus_mapel/" + id;
                }
            })
        }



    </script>
@endsection
