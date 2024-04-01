<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TeraPhone | Home</title>
    <link href="{{ asset('styles/swiper-bundle.min.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <nav class="bg-blue border-gray-200 dark:bg-gray-900">
        <div class="flex justify-between items-center mx-auto max-w-screen-2xl p-4 ms-5">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">TeraPhone</span>
            </a>
            <div class=" w-1/3">
                <form class="max-w-md mx-auto">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <input type="text" id="default-search" class="block w-full max-w-none a z-20  p-4 ps-10 text-sm text-white border border-gray-300 rounded-lg bg-blue2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " style="height: 40px;" placeholder="Cari Produk ..." required />
                        <button type="submit" style="height: 25px;" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg></button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center">
                <button type="button" class="relative inline-flex items-center mx-5 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="#" class=" text-white font-extrabold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>                    
                    </a>
                    <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red border-2 border-red rounded-2xl -top-2 -end-2 dark:border-gray-900">23</div>
                </button>
                <button type="button" class="relative inline-flex items-center mx-5 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="#" class=" text-white ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>                     
                    </a>
                    <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red border-2 border-red rounded-2xl -top-2 -end-2 dark:border-gray-900">2</div>
                </button>
                <a href="#" class="px-5 flex justify-center mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>  
                    <p class="text-white">Akun Saya</p>                    
                </a>
            </div>
        </div>
    </nav> 
    <nav class="bg-gray-50 dark:bg-gray-700 shadow-lg">
        <div class="max-w-screen-2xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Brand</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">flagsip</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Gaming</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Camera Quality</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Mid Range</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Low Range</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-5 flex justify-center ">
        <div id="default-carousel" class="relative w-1/2 mx-2" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
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
        <div class="mx-3">
            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer h-3/4">
                <a href="#">
                    <img class="md:h-96 max-w-md transition-all duration-300 rounded-lg cursor-pointer " src="{{ asset('images/imgRiski/rog.jpg') }}" alt="image description">
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
        <h1 class="text-2xl font-bold border-b-4 border-blue2">Penawaran Spesial</h1>
    </div>
    <div class="swiper w-5/6 ">
        <div class="slide-content">
            <div class=" swiper-wrapper">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <a href="#">
                        <img class="rounded-t-lg h-56 w-full" src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <p class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Lenovo IdeaPad Slim 1</p>
                        </a>
                        <small class="font-normal line-clamp-2 text-gray-700 dark:text-gray-400 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</small><br>
                        <div class="flex justify-star my-3">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-between my-2">
                            <p class="text-orange font-medium">Rp.1.999.000</p>
                            <small class="font-semibold">Tersedia : 22</small>
                        </div>
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue2 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <a href="#">
                        <img class="rounded-t-lg h-56 w-full" src="{{ asset('images/imgRiski/rog.jpg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <p class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Lenovo IdeaPad Slim 1</p>
                        </a>
                        <small class="font-normal line-clamp-2 text-gray-700 dark:text-gray-400 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</small><br>
                        <div class="flex justify-star my-3">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-between my-2">
                            <p class="text-orange font-medium">Rp.1.999.000</p>
                            <small class="font-semibold">Tersedia : 22</small>
                        </div>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue2 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <a href="#">
                        <img class="rounded-t-lg h-56 w-full" src="{{ asset('images/imgRiski/gambar 2.jpeg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <p class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Lenovo IdeaPad Slim 1</p>
                        </a>
                        <small class="font-normal line-clamp-2 text-gray-700 dark:text-gray-400 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</small><br>
                        <div class="flex justify-star my-3">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-between my-2">
                            <p class="text-orange font-medium">Rp.1.999.000</p>
                            <small class="font-semibold">Tersedia : 22</small>
                        </div>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue2 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 swiper-slide">
                    <a href="#">
                        <img class="rounded-t-lg h-56 w-full" src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <p class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Lenovo IdeaPad Slim 1</p>
                        </a>
                        <small class="font-normal line-clamp-2 text-gray-700 dark:text-gray-400 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</small><br>
                        <div class="flex justify-star my-3">
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                        </div>
                        <div class="flex justify-between my-2">
                            <p class="text-orange font-medium">Rp.1.999.000</p>
                            <small class="font-semibold">Tersedia : 22</small>
                        </div>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue2 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        
      
        <!-- If we need navigation buttons -->
        <div class="prev-swipe">
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>
        <div class="next-swipe">
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
      
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
        </div>

    </div>
    
</body>
<script src="{{ asset('scripts/swiper-bundle.min.js') }}"></script>
</html>
