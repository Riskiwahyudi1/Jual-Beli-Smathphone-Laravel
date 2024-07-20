@extends('layouts.main')
@section('container')

 @if(!request()->has('kategori') && !request()->has('search') && !request()->has('brand'))
<div class="mt-5 flex justify-center pt-28 space-x-4 relative">
    <div id="default-carousel" class="z-10 w-1/2" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/imgRiski/iklan1.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/imgRiski/iklan2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/imgRiski/iklan3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/imgRiski/iklan2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="mx-auto">
        <figure class="relative max-w-md cursor-pointer h-3/4">
            <a href="#">
                <img class="md:h-96  transition-all duration-300 rounded-lg cursor-pointer " src="{{ asset('images/imgRiski/rog.jpg') }}" alt="image description">
            </a>
            <figcaption class="absolute px-4 text-sm text-white bottom-6">
                <h3 class="text-blue2 font-black">ASUS ROG PHONE</h3>
                <p class="py-3">Pilih dan dapatkan sekarang</p>
                <button type="button" class="text-white bg-blue2 hover:bg-blue focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 z-10">Beli Sekarang</button>
            </figcaption>
          </figure>
    </div>
</div>
<div class="flex justify-center mt-20 mb-10">
    <h1 class="text-2xl font-bold border-b-4 px-4 border-blue2">Penawaran Spesial</h1>
</div>
{{-- wraper penawaran spesial --}}
<div class="swiper w-5/6 ">
    <div class="slide-content-4-card">
        <div class=" swiper-wrapper">
            @foreach ($diskons as $diskon)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <div class="font-bold text-white bg-blue2  text-sm px-4 absolute rounded-tl-lg rounded-br-lg py-2 lg:w-6/12">{{ $diskon->diskon }}% OFF</div>
                    <a href="/detail-produk/{{ $diskon->id . '-' . Str::slug($diskon->nama_produk) }}">
                        <img class="rounded-t-lg h-56 w-full" src="{{ json_decode($diskon->foto)[0] }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="/detail-produk/{{ $diskon->id . '-' . Str::slug($diskon->nama_produk) }}">
                            <p class="mb-2 text-md font-bold line-clamp-1 tracking-tight text-gray-900 dark:text-white">{{ $diskon->nama_produk }}</p>
                        </a>
                        <div class="flex justify-star mt-8">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-star my-2 gap-3">
                            <p class="text-red-600 font-bold text-lg">Rp.{{ number_format($diskon->harga - $diskon->diskon / 100 * $diskon->harga , 0, ',', '.') }}</p>
                            <small class="text-blue2 line-through text-sm">Rp.{{ number_format($diskon->harga, 0, ',', '.') }}</small>
                        </div>
                        <div class="flex justify-between">
                                
                            <small class="font-bold">Tersedia : {{ number_format($diskon->stok, 0, ',', '.') }}</small>
                            <small class="font-bold">Terjual : {{ number_format($diskon->terjual, 0, ',', '.') }}</small>
                        
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
    <!-- If we need pagination -->
    
    <!-- If we need navigation buttons -->
    <div class="prev-swipe">
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
    </div>
    <div class="next-swipe">
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

</div>

<div class="flex justify-center mx-28 my-10">
    
    
    <div class="w-1/2 h-72 bg-gray-800 mx-2 bg-cover bg-center rounded-lg" style="background-image: url('images/imgRiski/flagship.png');">
        <div class="ms-5 mt-20">
            <h3 class="text-blue2 font-black text-lg">Flagsip Smarthphone</h3>
            <p class="py-3 text-white">Pilih dan dapatkan sekarang</p>
            <a href="/home?kategori=flagship-smarthphone" class="text-white bg-blue2 hover:bg-blue focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 z-10">Tampilkan Semua</a>
        </div>
    </div>
    <div class="w-1/2 h-72 bg-gray-800 mx-2 bg-cover bg-center rounded-lg" style="background-image: url('images/imgRiski/gaming.jpg');">
        <div class="ms-5 mt-20">
            <h3 class="text-blue2 font-black text-lg">Gaming SmarthPhone</h3>
            <p class="py-3 text-white">Pilih dan dapatkan sekarang</p>
            <a href="/home?kategori=gaming-smarthphone" class="text-white bg-blue2 hover:bg-blue focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 z-10">Tampilkan Semua</a>
        </div>
    </div>
</div>
{{-- Camera Quality --}}
<div class="flex justify-center mt-10 mb-10">
    <h1 class="text-2xl font-bold border-b-4 border-blue2">Camera Quality</h1>
</div>
<div class="flex justify-center mx-28 my-10 ">

    <div class="w-96 bg-gray-800 mx-2 bg-cover bg-center rounded-tl-xl rounded-bl-xl mr-6" style="background-image: url('images/imgRiski/camera.png');">
        <div class="ms-5 mt-44">
            <h3 class="text-blue2 font-black text-lg">Camera Quality</h3>
            <p class="py-3 text-white">Pilih dan dapatkan sekarang</p>
            <a href="/home?kategori=camera-quality" class="text-white bg-blue2 hover:bg-blue focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 z-10">Tampilkan Semua</a>
        </div>
    </div>
    <div class="swiper w-5/6 ">
        <div class="slide-content-2-card">
            <div class=" swiper-wrapper">
                
                @foreach ($cameraQuality->produk as $item)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                <a href="/detail-produk/{{ $item->id . '-' . Str::slug($item->nama_produk) }}">
                    <img class="rounded-t-lg h-56 w-full" src="{{ asset(json_decode($item->foto)[0])  }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="/detail-produk/{{ $item->id . '-' . Str::slug($item->nama_produk) }}">
                        <p class="mb-2 text-md font-bold line-clamp-1 tracking-tight text-gray-900 dark:text-white">{{ $item->nama_produk }}</p>
                    </a>
                    <div class="flex justify-star mt-6">
                        <i class="fas fa-star" style="color: #FFD43B;"></i>
                        <i class="fas fa-star" style="color: #FFD43B;"></i>
                        <i class="fas fa-star" style="color: #FFD43B;"></i>
                        <i class="fas fa-star" style="color: #FFD43B;"></i>
                        <i class="fas fa-star" style="color: #FFD43B;"></i>
                    </div>
                    <div class="flex justify-star my-2 gap-3">
                        <p class="text-blue2 font-bold text-lg">Rp.{{ number_format($item->harga, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex justify-between">
                       
                        <small class="font-bold">Tersedia : {{ number_format($item->stok, 0, ',', '.') }}</small>
                        <small class="font-bold">Terjual : {{ number_format($item->terjual, 0, ',', '.') }}</small>

                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
        <!-- If we need pagination -->
        
      
        <!-- If we need navigation buttons -->
        <div class="prev-swipe">
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>
        <div class="next-swipe">
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
      

    </div>
</div>
{{-- mid range --}}
<div class="flex justify-center mt-10 mb-10">
    <h1 class="text-2xl font-bold border-b-4 border-blue2"> Mid Range Smarthphone</h1>
</div>
<div class="flex justify-center mx-28 mt-10 ">

    <div class="w-96 bg-gray-800 mx-2 bg-cover bg-center rounded-tl-xl rounded-bl-xl mr-6" style="background-image: url('images/imgRiski/mid-range.png');">
        <div class="ms-5 mt-44">
            <h3 class="text-blue2 font-black text-lg">Mid Range Smarthphone</h3>
            <p class="py-3 text-white ">Pilih dan dapatkan sekarang</p>
            <a href="/home?kategori=mid-range" class="text-white bg-blue2 hover:bg-blue focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 z-10">Tampilkan Semua</a>
        </div>
    </div>
    <div class="swiper w-5/6 ">
        <div class="slide-content-2-card">
            <div class=" swiper-wrapper">
                
                @foreach ($midRange->produk as $item)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <a href="/detail-produk/{{ $item->id . '-' . Str::slug($item->nama_produk) }}">
                        <img class="rounded-t-lg h-56 w-full" src="{{ asset(json_decode($item->foto)[0]) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="/detail-produk/{{ $item->id . '-' . Str::slug($item->nama_produk) }}">
                            <p class="mb-2 text-md font-bold line-clamp-1 tracking-tight text-gray-900 dark:text-white">{{ $item->nama_produk }}</p>
                        </a>
                        <div class="flex justify-star mt-8">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-star my-2 gap-3">
                            <p class="text-blue2 font-bold text-lg">Rp.{{ number_format($item->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between">
                           
                            <small class="font-bold">Tersedia : {{ number_format($item->stok, 0, ',', '.') }}</small>
                            <small class="font-bold">Terjual : {{ number_format($item->terjual, 0, ',', '.') }}</small>
    
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- If we need pagination -->
        
      
        <!-- If we need navigation buttons -->
        <div class="prev-swipe">
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>
        <div class="next-swipe">
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
      

    </div>
</div>
{{-- low Range --}}
<div class="flex justify-center mx-28 my-10">
    <div class="  w-full  h-96 bg-gray-800  bg-cover bg-center rounded-lg" style="background-image: url('images/imgRiski/low-range.jpg');">
        <div class="ms-5 mt-36">
            <h3 class="text-blue2 font-black text-lg">Low Range SmarthPhone</h3>
            <p class="py-3 text-white">Pilih dan dapatkan SmarthPhone harga terjangkau</p>
            <a href="/home?kategori=low-range" class="text-white bg-blue2 hover:bg-blue focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 z-10">Tampilkan Semua</a>
        </div>
    </div>
</div>
@elseif($search->isEmpty() && request()->has('kategori'))
<div class="h-[80vh] mx-32 bg-gray-300 my-32 rounded-md">
    <p class="text-center pt-64 ">Produk belum tersedia di kategori " <span class="font-bold text-red-600">{{ request('kategori') }}</span> " !!</p>
</div>
@elseif($search->isEmpty() && request()->has('search'))
<p class="pb-[45vh] pt-36 ms-[40vw]">Produk  " <span class="text-red font-bold">{{ request('search') }}</span> " tidak tersedia !!</p>
@elseif($search->isEmpty() && request()->has('brand'))
<div class="h-[80vh] mx-32 bg-gray-300 my-32 rounded-md">
    <p class="text-center pt-64">Produk dengan brand " <span class="text-red-600 font-bold">{{ request('brand') }}</span> " belum tersedia !!</p>
</div>
@else 
    <!-- Tampilkan hasil pencarian jika ada hasil pencarian -->
    @if ($search->isNotEmpty() && request()->has('kategori') || request()->has('search') || request()->has('brand'))
    <div class="container grid grid-cols-5 mx-auto gap-4 px-20 py-32">
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
                    <p class="text-blue2 font-bold text-lg">Rp.{{ number_format($produk->harga , 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                        
                    <small class="font-bold">Tersedia : {{ number_format($produk->stok, 0, ',', '.') }}</small>
                    <small class="font-bold">Terjual : {{ number_format($produk->terjual, 0, ',', '.') }}</small>
                
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
@endif
   
 @endsection

