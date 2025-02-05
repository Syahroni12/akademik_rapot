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
                                        onclick="window.location.href='/kelas'">
                                        reresh
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           <a href="{{ route('tambah_kelas') }}" class="btn btn-primary">Tambah Kelas</a>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">jurusan</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jurusan->jurusan }}</td>

                                <td> <a href="{{ route('edit_kelas',$item->id) }}" class="btn btn-warning">Edit</a> |<button type="button" class="btn btn-danger m-1"
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
                text: "Anda akan menghapus Kelas ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus_kelas/" + id;
                }
            })
        }



    </script>
@endsection
