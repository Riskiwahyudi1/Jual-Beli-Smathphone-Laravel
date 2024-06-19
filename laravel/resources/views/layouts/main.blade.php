<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TeraPhone | {{ $title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('styles/swiper-bundle.min.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    
</head>
<body class="bg-gray-100">
    @if ($title === 'Kategori' || $title === "Home" || $title === "Brand")
         @include('partials.navbar')
    
     @elseif($title !== 'Kategori' && $title !== "Home" && $title !== "Brand" && $title !== "Login User" && $title !== "Register Pembeli"  )
        <div class="flex justify-star mt-1 mb-6">
            <a href="/home" class="font-semibold mt-4 ms-6 mx-2  z-20">Home <small><i class="fas fa-play text-gray-500"></i></small> <span class="text-blue2 mt-4">{{ $title }}</span></a>
        </div> 
        @endif
        @yield('container')
    @if($title !== "Login User" && $title !== "Register Pembeli" && $title !== "Riwayat Transaksi")
        @include('partials.footer')
    @endif
    <a href="/layanan-pengguna"><i class="fas fa-headset right-2 bottom-2 text-blue2 font-bold text-3xl fixed"></i></a>
</body>
<script src="{{ asset('scripts/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('scripts/pembeli.js') }}"></script>
</html>