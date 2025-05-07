@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4 text-white" style="background-color: #404040;">
                    <div class="text-center mb-4">
                        <i class="bi bi-person-circle fs-1"></i>
                        <h3 class="fw-bold mb-3">{{ $username }}</h3>
                        <p><strong>Username:</strong> {{ $username }}</p>
                        <p><strong>Email:</strong> {{ strtolower($username) }}@example.com</p>
                        <p><strong>Role:</strong> User</p>
                    </div>

                    <hr class="text-secondary">

                    <div class="text-center mt-4">
                        <a href="{{ route('dashboard', ['username' => $username]) }}" class="btn btn-outline-light">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
