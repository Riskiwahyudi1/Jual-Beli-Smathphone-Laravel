{{-- navbar menu --}}
<nav class="bg-blue1 border-gray-200 dark:bg-gray-900 top-0 left-0 w-full z-30 fixed">
    <div class="flex justify-between items-center mx-auto max-w-screen-2xl p-4 ms-5">
        <a href="/home" class="flex items-center space-x-1 rtl:space-x-reverse">
            <img src="{{ asset('images/imgRiski/Teraphone white.png') }}" class="h-9 rounded-full " alt="Flowbite Logo" />
        </a>
        <div class=" w-1/3">
            @auth
                <form class="max-w-md mx-auto" action="/home">   
            @else
                <form class="max-w-md mx-auto" action="/">   
            @endauth
                @csrf
                <div class="relative">
                    @if (request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}"> 
                    @endif
                    <input type="text" id="default-search" name="search" class="block w-full max-w-none z-20 p-4 ps-10 text-sm text-white border border-gray-300 rounded-lg bg-blue2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="height: 40px;" placeholder="Cari Produk..." autocomplete="off" value="{{ request('search') }}"/>
                    <button type="submit" style="height: 25px;" class="text-gray-700 absolute end-2.5 bottom-2.5  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg></button>
                </div>
            </form>
        </div>
        <div class="flex justify-center">
            @auth
            <div type="button" class="relative inline-flex items-center mx-5 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue1 focus:ring-4 focus:outline-none">
                <a href="/keranjang" class=" text-white font-extrabold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>                    
                </a>
                @if ($keranjangInfo->count() > 0)
                <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red-600 border-2 border-red rounded-2xl -top-2 -end-2 dark:border-gray-900">{{ $keranjangInfo->count() }}</div>
                @endif
            </div>
            <div type="button" class="relative inline-flex items-center mx-5 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue1 focus:ring-4 focus:outline-none ">
                <a href="riwayat-transaksi?status=menunggu-pembayaran" class=" text-white ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>                     
                </a>
                @if ($TransaksiInfo > 0)
                <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red-600 border-2 border-red rounded-2xl -top-2 -end-2 dark:border-gray-900">{{ $TransaksiInfo }}</div>
                @endif
            </div>
            <div class="relative inline-flex items-center ms-12 mr-1 text-sm font-medium text-center text-white bg-blue1 rounded-lg hover:bg-blue1 focus:ring-4 focus:outline-none ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>  
            </div>
            <div class="mr-6">
                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white font-medium rounded-lg text-sm ms-1 text-center inline-flex items-center" type="button">{{ auth()->user()->username }}</button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="/user-profil" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white">Pengaturan akun</a>
                            </li>
                            <form action="/logout" method="post">
                            <li>
                                @csrf
                                <button type="submit" class="text-left px-4 w-full py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                            </li>
                        </form>
                        </ul>
                    </div>  
            </div>
            
            @else
            <div class="mt-2">
                <a href="/login-user" class="text-blue-600 bg-white hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-blue-300 font-bold rounded-xl text-sm px-5 py-2 text-center me-2 mb-2">Login</a>                 
                <a href="/register-pembeli" class="text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300 font-bold rounded-xl text-sm px-5 py-2 text-center me-2 mb-2">Register</a>                 
            </div>
            @endauth
        </div>
    </div>
</nav> 

{{-- navbar kategori produk --}}
<nav class="bg-gray-50 dark:bg-gray-700 shadow-lg top-16 left-0 w-full z-20 fixed">
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
                                    @auth
                                    <a href="/home?brand={{ $brand }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $brand }}</a>
                                    @else
                                    <a href="?brand={{ $brand }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $brand }}</a>
                                    @endauth
                                </li>
                                
                            @endforeach
                           
                        </ul>
                    </div>
                </li>
                <li>
                    @auth
                    <a href="/home" class="text-gray-500 {{ $active === $title && $title !== "Brand" && !request('kategori') ? '  border-gray-400 border-b-2 px-1 text-gray-900 font-bold': '' }} dark:text-white hover:text-gray-700" aria-current="page">Home</a>
                    @else
                    <a href="/" class="text-gray-500 {{ $active === $title && $title !== "Brand" && !request('kategori') ? '  border-gray-400 border-b-2 px-1 text-gray-900 font-bold': '' }} dark:text-white hover:text-gray-700" aria-current="page">Home</a>
                    @endauth
                </li>
                @foreach ($kategoris as $k)  
                <li>
                    @auth
                    <a href="/home?kategori={{ $k->slug }}" class="text-gray-500 {{ request('kategori') === $k->slug && $title !== "Brand" ? '  border-gray-400 border-b-2 px-1 text-gray-900 font-bold' : '' }} dark:text-white hover:text-gray-700 transition" >{{ $k->nama }}</a>
                    @else
                    <a href="?kategori={{ $k->slug }}" class="text-gray-500 {{ request('kategori') === $k->slug && $title !== "Brand" ? '  border-gray-400 border-b-2 px-1 text-gray-900 font-bold' : '' }} dark:text-white hover:text-gray-700 transition" >{{ $k->nama }}</a>
                    @endauth
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>