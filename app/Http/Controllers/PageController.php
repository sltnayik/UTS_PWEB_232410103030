<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan form login
    public function login()
    {
        return view('login');
    }

    // Menangani form login
    public function loginPost(Request $request)
    {
        $username = $request->input('username');

        // Simpan ke session
        session(['username' => $username]);

        return redirect()->route('dashboard', ['username' => $username]);
    }


    public function dashboard(Request $request)
    {
    // Ambil dari query jika ada (untuk memenuhi tugas), lalu simpan ke session
    if ($request->has('username')) {
        session(['username' => $request->query('username')]);
    }

    // Gunakan username dari session
    $username = session('username', 'Lionel Messi');

        // Data tugas default (statis)
        $todos = [
            ['judul' => 'Bangun', 'status' => 'Selesai'],
            ['judul' => 'Makan', 'status' => 'Belum Selesai'],
            ['judul' => 'Tidur', 'status' => 'Belum Selesai'],
        ];

        // Data tambahan dari session
        $extraTodos = session('extra_todos', []);
        $combinedTodos = array_merge($todos, $extraTodos);

        // Hitung statistik
        $total = count($combinedTodos);
        $selesai = count(array_filter($combinedTodos, fn($todo) => $todo['status'] === 'Selesai'));
        $belum = $total - $selesai;

        return view('dashboard', compact('username', 'total', 'selesai', 'belum'));
    }



    // Menampilkan halaman profil
    public function profile(Request $request)
    {
    // Mengecek apakah ada query parameter 'username'
    if ($request->has('username')) {
        session(['username' => $request->query('username')]);
    }

    // Ambil dari session, gunakan default jika belum ada
    $username = session('username', 'Lionel Messi');

    return view('profile', compact('username'));
    }

    // Menampilkan daftar to-do (statis, karena tanpa database)
    public function pengelolaan(Request $request)
    {
        // Data tugas statis
        $todos = [
            ['judul' => 'Bangun', 'status' => 'Selesai'],
            ['judul' => 'Makan', 'status' => 'Belum Selesai'],
            ['judul' => 'Tidur', 'status' => 'Belum Selesai'],
        ];

        // Tambah tugas dari session (jika ada)
        $sessionTodos = session('extra_todos', []);
        $combinedTodos = array_merge($todos, $sessionTodos);

        return view('pengelolaan', ['todos' => $combinedTodos]);
    }

    // Handle tambah tugas
    public function tambahTugas(Request $request)
    {
        $judul = $request->input('judul');

        if ($judul) {
            $newTodo = ['judul' => $judul, 'status' => 'Belum Selesai'];

            // Ambil yang lama lalu tambahkan
            $existing = session('extra_todos', []);
            $existing[] = $newTodo;

            // Simpan kembali
            session(['extra_todos' => $existing]);
        }

        return redirect()->route('pengelolaan')->with('success', 'Tugas berhasil ditambahkan!');
    }

}
