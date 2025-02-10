@extends('templating.main')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Card Jumlah Kelas -->


            <!-- Card Jumlah Siswa -->


            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-user fa-2x"></i></h5>
                        <p class="card-text fw-bold">Nama</p>
                        <h4>{{ auth()->user()->wali_kelas->nama }}</h4>
                    </div>
                </div>
            </div>

            <!-- Card NISN -->
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-id-card fa-2x"></i></h5>
                        <p class="card-text fw-bold">NIP</p>
                        <h4>{{  auth()->user()->wali_kelas->nip }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-user-graduate fa-2x"></i> </h5>
                        <p class="card-text fw-bold">Jumlah Siswa</p>
                        <h4>{{ $jumlah_siswa }}</h4>
                    </div>
                </div>
            </div>



            <!-- Card Jumlah Wali Kelas -->


            <!-- Card Jumlah Mapel -->


            <!-- Card Jumlah Ekskul -->

        </div>
    </div>
@endsection
