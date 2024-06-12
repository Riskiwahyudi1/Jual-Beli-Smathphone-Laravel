@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Transaksi</p>
    <input type="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mx-64 w-2/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Transaksi...." required />
    <button type="submit" style="height: 25px;" class="text-blue-700 absolute   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg></button>
    <div class="flex justify-around mt-6 mx-12">
        

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
            <th scope="col" class="px-6 py-3">
                Penjual
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                1
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('images/imgRiski/1Iphone113.jpg') }}" alt="">
                    <div class="pl-3">
                        <div class="text-base font-semibold">Y22 4GB+128GB Metaverse Green</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                Id Produk
            </td>
            <td class="px-6 py-4">
            1.999.000 
            </td>
            <td class="px-6 py-4">
                Vivo
            </td>
            <td class="px-6 py-4">
                3      
            </td>
            <td class="px-6 py-4">   
            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"></button>
            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:focus:ring-orange-900"></button>


            
            
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection