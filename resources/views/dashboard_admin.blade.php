@extends('templating.main')
@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Card Jumlah Kelas -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-school fa-2x"></i></h5>
                    <p class="card-text fw-bold">Jumlah Kelas</p>
                    <h3>{{ $jumlah_kelas }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Detail Kelas -->
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-list fa-2x"></i></h5>
                    <p class="card-text fw-bold">Detail Kelas</p>
                    <h3>{{ $jumlah_detailkelas }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Siswa -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-user-graduate fa-2x"></i></h5>
                    <p class="card-text fw-bold">Jumlah Siswa</p>
                    <h3>{{ $jumlah_siswa }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Wali Kelas -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-chalkboard-teacher fa-2x"></i></h5>
                    <p class="card-text fw-bold">Wali Kelas</p>
                    <h3>{{ $jumlah_wali_kelas }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Mapel -->
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-book fa-2x"></i></h5>
                    <p class="card-text fw-bold">Jumlah Mapel</p>
                    <h3>{{ $jumlah_mapel }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Ekskul -->
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-running fa-2x"></i></h5>
                    <p class="card-text fw-bold">Jumlah Ekskul</p>
                    <h3>{{ $jumlah_ekskul }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Jurusan (Warna Cerah) -->
        <div class="col-md-3">
            <div class="card bg-light text-dark mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-university fa-2x"></i></h5>
                    <p class="card-text fw-bold">Jumlah Jurusan</p>
                    <h3>{{ $jumlah_jurusan }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
