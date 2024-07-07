<nav class="flex justify-between py-3 shadow-md fixed w-full z-20 bg-white">
    <div class="flex justify-star mx-5">
        <img src="{{ asset('images/imgRiski/Terafon.png') }}" class="h-7 rounded-full " alt="Flowbite Logo" />
    </div>
    <a href="#" class="flex justify-center mx-5">
        
        <p class="text-black font-semibold ms-1 mt-2"><i class="fa-solid fa-shop mr-2"></i>{{ auth()->user()->username }}</p>                    
    </a>
</nav>
<nav class="w-[10vw] bg-gray-200 h-[100vh] fixed mt-12 z-10">
    <a href="home-penjual">
        <button class="px-4 py-2 ms-4 {{ $active === "home-penjual" ? '  bg-blue2 text-white': '' }} mt-8 rounded-md  font-semibold"><i class="fa-solid fa-house mr-2"></i></i>Beranda</button>
    </a>
    <a href="/produk-penjual">
        <button class="px-4 py-2 ms-4 {{ $active === "produk-penjual" || $active === "tambah-produk-penjual" || $active === "detail-produk" || $active === "cari-produk" || $active === "edit-produk"? '  bg-blue2 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-box mr-2"></i>Produk</button>
    </a>
    <a href="/status-orderan">
        <button class="px-4  py-2 ms-4 {{ $active === "status-orderan" ? '  bg-blue2 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-list mr-2"></i>Orderan</button>
    </a>
    <a href="/kelola-stok">
        <button class="px-4 py-2 ms-4 {{ $active === "kelola-stok" ? '  bg-blue2 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-circle-plus mr-2"></i>Stok</button>
    </a>
    <a href="/layanan-pengguna-penjual">
        <button class="px-4 py-2 ms-4 {{ $active === "layanan-pengguna-penjual" ? '  bg-blue2 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-circle-question mr-2"></i>Bantuan</button>
    </a>
    <form action="/logout" method="post">
        
    @csrf
    <button type="submit" class=" absolute bottom-12 px-4 py-2 ms-4 text-red-600 mt-2 rounded-md font-bold"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
            
    </form>
</nav>