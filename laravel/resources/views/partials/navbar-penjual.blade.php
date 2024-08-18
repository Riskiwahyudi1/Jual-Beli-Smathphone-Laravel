<nav class="flex justify-between py-3 shadow-md fixed w-full z-20 bg-white">
    <div class="flex justify-star mx-5">
        <img src="{{ asset('images/imgRiski/Terafon.png') }}" class="h-7 rounded-full " alt="Flowbite Logo" />
    </div>
    
    <div class="relative inline-flex items-center mr-4">
        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-black font-medium rounded-lg text-sm ms-1 text-center inline-flex items-center" type="button">
            <i class="fa-solid fa-shop mr-2 relative">
                @if($nullDataUser)
                    <div class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-medium text-white bg-red-600 border-2 border-red rounded-full -top-1 -end-1 dark:border-gray-900">
                        !
                    </div>   
                @endif
            </i>
            {{ auth()->user()->username }}
        </button>
    
        <!-- Dropdown menu -->
        <div id="dropdownHover" class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                <li>
                    <a href="/user-profil" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-gear mr-2"></i>Pengaturan akun 
                        @if($nullDataUser)
                        <span class="text-red-600 font-bold text-xl">*</span>  
                        @endif
                    </a>
                </li>
                <li>
                    <a href="/change-password" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-key mr-2"></i>Ganti Kata Sandi</a>
                </li>
                <form action="/logout" method="post">
                    <li>
                        @csrf
                        <button type="submit" class="text-left px-4 w-full py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
                    </li>
                </form>
            </ul>
        </div>
    </div>
    
</nav>
<nav class="w-[10vw] bg-gray-700 h-[100vh] fixed mt-12 z-10">
    <a href="home-penjual">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "home-penjual" ? '  bg-blue2 text-black': 'text-white' }} mt-8 rounded-md  font-semibold"><i class="fa-solid fa-house mr-2"></i></i>Beranda</button>
    </a>
    <a href="/produk-penjual">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "produk-penjual" || $active === "tambah-produk-penjual" || $active === "detail-produk" || $active === "cari-produk" || $active === "edit-produk"? '  bg-blue2 text-black': 'text-white' }} mt-2 rounded-md font-semibold"><i class="fas fa-box mr-2"></i>Produk</button>
    </a>
    <a href="/status-orderan">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "status-orderan" ? '  bg-blue2 text-black': 'text-white' }} mt-2 rounded-md font-semibold"><i class="fas fa-list mr-2"></i>Orderan</button>
    </a>
    <a href="/kelola-stok">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "kelola-stok" ? '  bg-blue2 text-black': 'text-white' }} mt-2 rounded-md font-semibold"><i class="fas fa-circle-plus mr-2"></i>Stok</button>
    </a>
    <a href="/layanan-pengguna-penjual">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "layanan-pengguna-penjual" ? '  bg-blue2 text-black': 'text-white' }} mt-2 rounded-md font-semibold"><i class="fas fa-circle-question mr-2"></i>Bantuan</button>
    </a>
    <form action="/logout" method="post">
        
    @csrf
    <button type="submit" class=" absolute bottom-12 w-32 py-2 text-left ps-4 text-white mt-2 rounded-md font-bold"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
            
    </form>
</nav>