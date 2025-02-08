@extends('templating.main')
@section('content')
    <div class="card">
        <div class="card-body">



            <a href="{{ route('pengikut_ekskul') }}" class="btn btn-danger">Kembali </a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ekstrakulikuler</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->ekskul->ekskul }}</td>
                                <td>{{ $item->keterangan }}</td>

                                <td> <a href="{{ route('edit_pengikut_ekskul', $item->id) }}" class="btn btn-warning">Edit</a>|<button type="button" class="btn btn-danger m-1"
                                        onclick="hapus({{ $item->id }})">Hapus</button>
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
                text: "Anda akan menghapus Pengikut Ekstrakulikuler  ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus_pengikut_ekskul/" + id;
                }
            })
        }
    </script>
@endsection
