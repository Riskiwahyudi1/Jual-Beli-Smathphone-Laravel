@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Produk</p>
    <button type="button" class=" ms-6 mt-5 text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Jual Produk</button>
    <div class="flex justify-center "> <!-- Flexbox container untuk pusat -->
        <div class="relative w-1/3"> <!-- Kontainer input dan svg -->
            <input type="text" name="name" class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200" placeholder="Cari Produk ...">
            <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100"
                x="10px" y="10px" viewBox="0 0 56.966 56.966"
                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                </path>
            </svg>
        </div>
    </div>
    <div class="flex justify-center gap-20 shadow-lg py-4 mt-6 mx-32 rounded-md">

<div class="flex justify-center">
    <div>
        <p>Semua</p>
    </div>
</div>
<div class="flex justify-center">
    <div>
        <p>Menunggu Konfirmasi</p>
    </div>

</div>

    
<div class="flex justify-center">
    <div>
        <p>Dalam Pengiriman</p>
    </div>
</div>
<div class="flex justify-center">
    <div>
        <p>Selesai</p>
    </div>
</div>
<div class="flex justify-center">
    <div>
        <p>Dibatalkan</p>
    </div>
</div>

</div>
<button type="submit" style="height: 25px;"
        class="text-blue-700 absolute   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
            class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg></button>
        <p class="ms-6 mt-12 text-2xl font-bold text-black">Daftar Produk</p>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8"> <!-- Tambahkan margin atas -->
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class=" py-3">No</th>
                <th scope="col" class=" py-3">Id Produk</th>
                <th scope="col" class=" py-3">Produk</th>
                <th scope="col" class=" py-3">Harga</th>
                <th scope="col" class=" py-3">Brand</th>
                <th scope="col" class=" py-3">Terjual</th>
                <th scope="col" class=" py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-4 py-4">1</td>
                <td class=" py-4">12345678</td>
                <th scope="row" class="flex items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('images/imgRiski/1Iphone113.jpg') }}" alt="">
                    <div class="">
                        <div class="text-base font-semibold">Y22 4GB+128GB Metaverse Green</div>
                    </div>
                </th>
                <td class=" py-4">1.999.000</td>
                <td class=" py-4">Vivo</td>
                <td class=" py-4">3</td>
                <td class=" py-4">
                
                <i class="text-yellow-500 ms-4 fas fa-pen" style="color: blue;"></i>
                     <i class="fas fa-trash mr-2" style="color: red;"></i>
                     <button type="button"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300  rounded-full text-md px-3  py-1 me-2 mb-2 dark:focus:ring-yellow-900 font-bold">!</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
