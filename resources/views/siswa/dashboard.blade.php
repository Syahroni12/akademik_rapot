@extends('templating.main')

@section('content')
    <div class="container mt-4">


        <div class="row">
            <!-- Card Data Siswa -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-user fa-2x"></i></h5>
                        <p class="card-text fw-bold">Nama Siswa</p>
                        <h4>{{ $siswa->nama }}</h4>
                    </div>
                </div>
            </div>

            <!-- Card NISN -->
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-id-card fa-2x"></i></h5>
                        <p class="card-text fw-bold">NISN</p>
                        <h4>{{ $siswa->nisn }}</h4>
                    </div>
                </div>
            </div>

            <!-- Card Kelas -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-chalkboard fa-2x"></i></h5>
                        <p class="card-text fw-bold">Kelas</p>
                        <h4>{{ $siswa->detail_kelas->nama_kelas }}</h4>
                    </div>
                </div>
            </div>

            <!-- Card Semester -->
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-calendar-alt fa-2x"></i></h5>
                        <p class="card-text fw-bold">Semester</p>
                        <h4>{{ $siswa->semester }}</h4>
                    </div>
                </div>
            </div>

            <!-- Card Mata Pelajaran yang Belum Dinilai -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-book-open fa-2x"></i></h5>
                        <p class="card-text fw-bold">Mapel Belum Dinilai</p>
                        <h4>{{ $mapel_belum }}</h4>
                    </div>
                </div>
            </div>

            <!-- Card Mata Pelajaran yang Sudah Dinilai -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-check-circle fa-2x"></i></h5>
                        <p class="card-text fw-bold">Mapel Sudah Dinilai</p>
                        <h4>{{ $mapel_sudah }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
