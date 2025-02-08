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
                                        onclick="window.location.href='{{ route('walikelas') }}'">
                                        reresh
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ route('tambah_walikelas') }}" class="btn btn-primary">Tambah Wali Kelas</a>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NIP/NBM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->nip }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->detail_kelas->nama_kelas ?? 'Belum Memiliki Kelas' }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->tgl_lahir }}</td>

                                <td> <a href="{{ route('edit_walikelas', $item->nip) }}" class="btn btn-warning">Edit</a>
                                    |<button type="button" class="btn btn-danger m-1"
                                        onclick="hapus('{{ $item->nip }}')">Hapus</button>|<a
                                        href="{{ route('detail_walikelas', $item->nip) }}" class="btn btn-info">Detail</a>
                                    |<button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onclick="password({{ $item->id_user }})">
                                        ubah password
                                    </button>

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






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ubah_password') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <input type="hidden" name="id_user" id="id_user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus Wali Kelas ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus_walikelas/" + id;
                }
            })
        }


        function password(id) {
            console.log(id);
            document.getElementById('id_user').value=id;

        }
    </script>
@endsection
