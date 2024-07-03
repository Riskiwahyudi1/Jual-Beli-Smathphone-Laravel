@extends('layouts.main')
@section('container')
<!-- Header -->
<header class="bg-blue2 flex items-center justify-between p-1 text-white">
    <a href="/home" class="font-bold text-white"><i class="fa-solid fa-backward mr-2"></i>Home</a>
</header>

<!-- Store Info Section -->
<div class="bg-gray-300  flex flex-col md:flex-row items-center justify-start py-4 gap-4 shadow-lg ms-4">
    <img src="{{ asset('images/imgRiski/Foto-toko.jpg') }}" class="w-16 h-16 rounded-full" alt="Logo">
    <div class="text-center md:text-left">
        <h3 class="text-black capitalize text-2xl font-bold">{{ request('user') }}</h3>
        <div class="flex justify-center md:justify-start gap-8 font-bold text-black">
            <small>Produk: {{ $jmlProdukToko  }}</small>
            <small>Rating: <i class="fas fa-star text-yellow-500"></i> 5.0</small>
            <small>Terjual: {{ $penjualan  }}</small>
        </div>
    </div>
</div>
<!-- Navigation Section -->
<nav class="bg-gray-50 dark:bg-gray-700  mb-4">
    <div class="px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium space-x-8 text-sm">
                <li>
                    <p id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-700 cursor-pointer flex items-center">
                        Brand
                        <svg class="w-2.5 h-2 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </p>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700">
                            @foreach (array_unique($brands) as $brand)
                                <li>
                                    <a href="/view-penjual?user={{ request('user') }}&brand={{ $brand }}" class="block px-4 py-2 hover:bg-gray-100">{{ $brand }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="/view-penjual?user={{ request('user') }}" class="text-gray-500 {{ $active === $title && $title !== 'Brand' && !request('kategori') ? 'border-b-2 border-gray-400 px-1 text-gray-900 font-bold' : '' }} hover:text-gray-700">Home Toko</a>
                </li>
                @foreach ($kategoris as $k)  
                    <li>
                        <a href="/view-penjual?user={{ request('user') }}&kategori={{ $k->slug }}" class="text-gray-500 {{ request('kategori') === $k->slug && $title !== 'Brand' ? 'border-b-2 border-gray-400 px-1 text-gray-900 font-bold' : '' }} hover:text-gray-700 transition">{{ $k->nama }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Search Form -->
<form class="max-w-md mx-auto mb-2" action="/view-penjual">   
    {{-- @csrf --}}
    <div class="relative flex items-center">
        @if (request('user'))
            <input type="hidden" name="user" value="{{ request('user') }}"> 
        @endif
        @if (request('kategori'))
            <input type="hidden" name="kategori" value="{{ request('kategori') }}"> 
        @endif
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk di toko ini" class="w-full p-2 border border-gray-300 rounded-lg">
        <button type="submit" class="absolute right-0 p-2 bg-blue2 text-white rounded-r-lg">Cari</button>
    </div>
</form>


<div class="w-full">
    @if (request()->has('user') || request()->has('search' || request()->has('kategori')))
        @if(!$search->isEmpty())
        <div class="container grid grid-cols-4 mx-auto gap-4 px-36 py-4">
            @foreach ($search as $produk)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <a href="/detail-produk/{{ $produk->id . '-' . Str::slug($produk->nama_produk) }}">
                        <img class="rounded-t-lg h-56 w-full" src="{{ json_decode($produk->foto)[0] }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="/detail-produk/{{ $produk->id . '-' . Str::slug($produk->nama_produk) }}">
                            <p class="mb-2 text-md font-bold line-clamp-1 tracking-tight text-gray-900 dark:text-white">{{ $produk->nama_produk }}</p>
                        </a>
                        <div class="flex justify-star mt-8">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-star my-2 gap-3">
                            <p class="text-blue2 font-bold text-lg">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between">
                            <small class="font-bold">Tersedia : {{ number_format($produk->stok, 0, ',', '.') }}</small>
                            <small class="font-bold">Terjual : {{ number_format($produk->terjual, 0, ',', '.') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <div class="w-full h-[70vh] bg-gray-200 text-center align-middle mx-auto">
                @if (request()->has('kategori') && request()->has('search'))
                    <p class="pt-56 font-bold">Produk  <span class="text-red-600">"{{ request('search') }}"</span> tidak ditemukan di kategori <span class="text-red-600">"{{ request('kategori') }}"</span>!</p>
                @elseif (request()->has('kategori'))
                    <p class="pt-56 font-bold">Produk kategori <span class="text-red-600">"{{ request('kategori') }}"</span> belum tersedia di toko ini!</p>
                @elseif (request()->has('brand'))
                    <p class="pt-56 font-bold">Produk <span class="text-red-600">"{{ request('brand') }}"</span> belum tersedia di toko ini!</p>
                @elseif (request()->has('search'))
                    <p class="pt-56 font-bold">Produk <span class="text-red-600">"{{ request('search') }}"</span> tidak ditemukan!</p>
                @endif
            </div>
        @endif
    @endif
</div>



@endsection