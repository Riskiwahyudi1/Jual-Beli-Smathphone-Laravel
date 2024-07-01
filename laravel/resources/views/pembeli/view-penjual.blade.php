@extends('layouts.main')
@section('container')
<div class="bg-gray-400 w-full flex flex-col md:flex-row items-center justify-center py-4 gap-4">
    <a href="/home" class="top-4 fixed left-4 font-bold"><i class="fa-solid fa-backward mr-2"></i>Home</a>
    <img src="{{ asset('images/imgRiski/Foto-toko.jpg') }}" class="w-32 h-32 rounded-full" alt="Logo">
    <div class="text-center md:text-left">
        <h3 class="text-black capitalize text-2xl font-bold">{{ request('user') }}</h3>
        <p class="text-gray-800 md:w-2/4 mx-auto md:mx-0">
            Selamat datang di Toko HP Terbaik, destinasi utama Anda untuk semua kebutuhan ponsel cerdas! Kami menyediakan berbagai pilihan smartphone!
        </p>
        
        <div class="flex justify-center md:justify-start gap-12 mt-4 font-bold text-black">
            <p>Terjual: 1500</p>
            <p>Rating: <i class="fas fa-star text-yellow-500"></i> 5.0</p>
        </div>
    </div>
</div>
<form class="max-w-md mx-auto" action="/view-penjual">   
    @csrf
    <div class="relative">
        @if (request('user'))
        <input type="hidden" name="kategori" value="{{ request('kategori') }}"> 
        @endif
       
    </div>
</form>
<!-- Navigation Section -->
<nav class="bg-gray-50 dark:bg-gray-700 shadow-lg top-16 left-0 w-full z-20 ">
    <div class="max-w-screen-2xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-2 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    
                <p id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center inline-flex items-center cursor-pointer" type="button">Brand<svg class="w-2.5 h-2 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </p>
                    
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            @foreach (array_unique($brands) as $brand)
                                <li>
                                    <a href="/view-penjual?user={{ request('user') }}&brand={{ $brand }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $brand }}</a>
                                </li>
                                
                            @endforeach
                           
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="/view-penjual?user={{ request('user') }}" class="text-gray-500 {{ $active === $title && $title !== "Brand" && !request('kategori') ? '  border-gray-400 border-b-2 px-1 text-gray-900 font-bold': '' }} dark:text-white hover:text-gray-700" aria-current="page">Home Toko</a>
                </li>
                @foreach ($kategoris as $k)  
                <li>
                    <a href="/view-penjual?user={{ request('user') }}&kategori={{ $k->slug }}" class="text-gray-500 {{ request('kategori') === $k->slug && $title !== "Brand" ? '  border-gray-400 border-b-2 px-1 text-gray-900 font-bold' : '' }} dark:text-white hover:text-gray-700 transition" >{{ $k->nama }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
<div class="w-full">
     @if ( request()->has('user') )
    <div class="container grid grid-cols-4 mx-auto gap-4 px-36 py-8">
        @foreach ($search as $produk)

        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
            <a href="/detail-produk/{{ $produk->id . '-' . Str::slug($produk->nama_produk) }}">
                <img class="rounded-t-lg h-56 w-full" src="{{ json_decode($produk->foto)[0] }}" alt="" />
            </a>
            <div class="p-5">
                <a href="/detail-produk/{{ $produk->id . '-' . Str::slug($produk->nama_produk) }}">
                    <p class="mb-2 text-md font-bold line-clamp-1 tracking-tight text-gray-900 dark:text-white">{{ $produk->nama_produk }}</p>
                </a>
                {{-- <small class="font-normal line-clamp-2 text-gray-700 dark:text-gray-400 ">{{$produk->deskripsi }}</small><br> --}}
                <div class="flex justify-star my-3">
                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                </div>
                <div class="flex justify-star my-2 gap-3">
                    <p class="text-orange font-medium text-lg">Rp.{{ number_format($produk->harga , 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                        
                    <small class="font-semibold">Terjual : {{ number_format($produk->terjual, 0, ',', '.') }}</small>
                
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection