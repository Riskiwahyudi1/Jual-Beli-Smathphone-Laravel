<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TeraPhone | {{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('styles/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    
</head>
<body class="bg-gray-700">
    @include('partials.navbar-admin')
    @yield('container-penjual')
    {{-- @include('partials.footer') --}}
</body>
<script src="{{ asset('scripts/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('scripts/pembeli.js') }}"></script>
</html>