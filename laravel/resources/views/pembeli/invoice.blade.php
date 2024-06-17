@extends('layouts.main')
@section('container')

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Selamat Datang</h1>
        <p>Halaman utama aplikasi Anda.</p>

        <a href="{{ route('generate.pdf') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Cetak PDF
        </a>
    </div>
@endsection
