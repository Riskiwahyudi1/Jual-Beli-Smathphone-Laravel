@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-12 text-3xl font-bold text-black">Transaksi</p>

    <div class="flex justify-center mb-10"> <!-- Flexbox container untuk pusat -->
        <div>

            <form class="max-w-sm mx-auto">
            </form>
            
        </div>
        <div class="relative w-1/3 ms-10"> <!-- Kontainer input dan svg -->
            <input type="text" name="name"
                class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200"
                placeholder="Cari Transaksi ...">
            <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100" x="10px" y="10px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                </path>
            </svg>
        </div>
    </div>
    <div><p class="ms-6 mt-12 text-xl font-bold text-black">Daftar Transaksi</p></div>



    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Id Produk
            </th>
            <th scope="col" class="px-6 py-3">
                Produk
            </th>
            <th scope="col" class="px-6 py-3">
                 Total Pembayaran
            </th>
            <th scope="col" class="px-6 py-3">
                Pembeli
            </th>
            <th scope="col" class="px-6 py-3 pl-4">
                Penjual
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal
            </th>
            <th scope="col" class="px-6 py-3 pl-8 ">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                1
                </td>
                <td class="px-6 py-4">
                12345
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('images/imgRiski/1Iphone113.jpg') }}" alt="">
                    <div class="pl-3">
                        <div class="text-base font-semibold">Y22 4GB+128GB Metaverse Green</div>
                    </div>
                </th>
                
            <td class="px-6 py-4">
            1.999.000 
            </td>
            <td class="px-6 py-4">
                Veronika
                
            </td>
            <td class="px-6 py-4">
                Admin
            </td>
            <td class="px-6 py-4">
                    14/06/23
            </td>
            <td class="px-6 py-4">   
            <i class="fas fa-trash mr-2" style="color: red;"></i>
            <button> 
            <i class="fa-solid mr-3 text-yellow-500 fa-circle-exclamation px-2"> </i>
            </button>



            
            
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection