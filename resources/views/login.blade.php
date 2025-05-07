@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4">
            <form action="/login" method="POST" class="card p-4 shadow text-white login-card">
                @csrf
                <h2 class="text-center mb-4">Login</h2>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-secondary w-100">Login</button>
            </form>
        </div>
    </div>
@endsection
