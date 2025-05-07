@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-5">
        <div class="dashboard-wrapper">
            <!-- Header -->
            <div class="text-white mb-4">
                <h2 class="fw-bold">Halo, {{ $username }}</h2>
                <p class="text-muted">Selamat datang di Dashboard To-Do kamu!</p>
            </div>

            <!-- Stats Card -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card stat-card bg-success text-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tugas Selesai</h5>
                            <p class="display-6 fw-bold">{{ $selesai }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card bg-warning text-dark shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tugas Belum</h5>
                            <p class="display-6 fw-bold">{{ $belum }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card bg-primary text-white shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Tugas</h5>
                            <p class="display-6 fw-bold">{{ $total }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="card quick-nav p-4 shadow-sm bg-secondary text-white">
                <h5 class="mb-3">Akses Cepat</h5>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('pengelolaan') }}" class="btn btn-dark">Kelola Tugas</a>
                    <a href="{{ route('profile') }}" class="btn btn-dark">Lihat Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
