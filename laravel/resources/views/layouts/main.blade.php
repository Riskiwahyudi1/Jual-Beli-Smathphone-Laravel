<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
    <title>TeraPhone | {{ $title }}</title>
    @else
    <title>TeraPhone</title>
    @endauth
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('styles/swiper-bundle.min.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-200">
        @if ($title === 'Kategori' || $title === "Home" || $title === "Brand")
            @include('partials.navbar')
        @elseif (!in_array($title, ['Login User', 'Register Pembeli', 'Login Admin', 'View Penjual']))
            <div class="flex justify-star mt-1 mb-6">
                <a href="/home" class="font-semibold mt-4 ms-6 mx-2 z-20">Home <small><i class="fas fa-play text-gray-500"></i></small> <span class="text-blue2 mt-4">{{ $title }}</span></a>
            </div>
        @endif
        @yield('container')
        @if (!in_array($title, ['Login User', 'Register Pembeli', 'Riwayat Transaksi', 'Login Admin', 'Profil User']))
            @include('partials.footer')
            <a href="/layanan-pengguna"><i class="fas fa-headset right-2 bottom-2 text-blue2 font-bold text-3xl fixed"></i></a>
        @endif


    <script src="{{ asset('scripts/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('scripts/pembeli.js') }}"></script>
</body>
</html>
