<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body class="bg-dark text-white" style="height: 100vh; display: flex; flex-direction: column; padding-top: 56px; min-height: 100vh;">
    @include('components.navbar')

    <div class="container mt-4 flex-grow-1">
        @yield('content')
    </div>

    @include('components.footer')
</body>
</html>
