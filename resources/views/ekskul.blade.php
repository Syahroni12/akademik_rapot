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
                                        onclick="window.location.href='{{ route('ekskul') }}'">
                                        refresh
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Ekskul
            </button>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ekstrakulikuler</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->ekskul }}</td>

                                <td> <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal" onclick="edit({{ $item }})">
                                        Edit
                                    </button>|<button type="button" class="btn btn-danger m-1"
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



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Ekstrakulikuler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_ekskul') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="ekskul" class="form-label">Ekstrakulikuler</label>
                            <input type="text" class="form-control" id="ekskul" name="ekskul">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Ekskrakulikuler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_ekskul') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="ekskul" class="form-label">Ekstrakulikuler</label>
                            <input type="text" class="form-control" id="ekskull" name="ekskul">
                        </div>
                        <input type="hidden" name="id" id="id_ekskul">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus Ekstrakulikuler  ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus_ekskul/" + id;
                }
            })
        }


        function edit(data) {
            document.getElementById('ekskull').value = data.ekskul;
            document.getElementById('id_ekskul').value = data.id;
        }
    </script>
@endsection
