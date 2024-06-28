<nav class="flex justify-between py-3 shadow-md fixed w-full z-30 bg-white">
    <div class="flex justify-star mx-5">
        <img src="{{ asset('images/imgRiski/Terafon.png') }}" class="h-7 rounded-full " alt="Flowbite Logo" />
    </div>
    <a href="#" class="flex justify-center mx-5">
        <p class="text-black font-semibold ms-1 mt-2"><i class="fas fa-store mr-2"></i>{{ auth()->user()->username }}</p><br>                    
    </a>
</nav>
<nav class="w-[10vw] bg-gray-200 h-[100vh] fixed mt-12 z-10">
    <a href="/home-admin">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "Home Admin" ? '  bg-blue2 ps-4 text-white': '' }} mt-8 rounded-md font-semibold"><i class="fas fa-landmark mr-2"></i>Beranda</button>
    </a>
    <a href="/admin-data-user">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "Admin Data User" ? '  bg-blue2 ps-4 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-regular fa-user mr-2"></i>User</button>
    </a>
    <a href="/admin-produk">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "Admin Produk" ? '  bg-blue2 ps-4 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-solid fa-box mr-2"></i>Produk</button>
    </a>
    <a href="/admin-transaksi">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "Admin Transaksi" ? '  bg-blue2 ps-4 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fas fa-solid fa-check mr-2"></i>Transaksi</button>
    </a>
    <a href="/admin-pengaduan">
        <button class="w-32 py-2 text-left ps-4 {{ $active === "Admin Pengaduan" ? '  bg-blue2 ps-4 text-white': '' }} mt-2 rounded-md font-semibold"><i class="fa-solid fa-envelope mr-2"></i>Pesan</button>
    </a>
    <form action="/admin-logout" method="post">
        
        @csrf
        <button type="submit" class=" absolute bottom-12 px-4 py-2 ms-4 text-red-600 mt-2 rounded-md font-bold"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
                
        </form>
</nav>

