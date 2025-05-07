@extends('layouts.app')

@section('title', 'Pengelolaan Tugas')

@section('content')
    <div class="mb-4">
        <h3 class="mb-1">Daftar Tugas</h3>
        <p class="text-muted">Kelola to-do list kamu di sini.</p>
    </div>

    {{-- ALERT TAMBAH TUGAS --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    {{-- ALERT HAPUS TUGAS (SIMULASI) --}}
    @if (request('success') === 'hapus')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Tugas berhasil dihapus! (simulasi)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    {{-- FORM TAMBAH TUGAS --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body ">
            <form action="{{ route('tambah.tugas') }}" method="POST" class="row g-3 align-items-center d-flex justify-content-evenly align-items-center">
                @csrf
                <div class="col-md-8">
                    <input type="text" name="judul" class="form-control" placeholder="Tugas baru..." required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-secondary ">Tambah Tugas</button>
                </div>
            </form>
        </div>
    </div>

    {{-- TABEL TUGAS --}}
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todos as $index => $todo)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todo['judul'] }}</td>
                        <td>
                            @if ($todo['status'] === 'Selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Belum Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="?success=selesai" class="btn btn-sm btn-outline-success me-1">Tandai Selesai</a>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $index }}">
                                Hapus
                            </button>

                            {{-- Modal hapus --}}
                            <x-modal
                                id="hapusModal{{ $index }}"
                                title="Konfirmasi Hapus"
                                actionUrl="?success=hapus">
                                Apakah kamu yakin ingin menghapus tugas: <strong>{{ $todo['judul'] }}</strong>?
                            </x-modal>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada tugas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
