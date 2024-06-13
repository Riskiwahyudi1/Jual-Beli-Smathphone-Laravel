@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-20 ps-40">
    <p class="ms-6 text-2xl font-bold text-black">Dashboard </p>
    <div class="grid grid-cols-4 grid-rows-2 gap-6 mt-6 mx-12">
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-regular fa-user fa-3x"></i>
            <div>
                <p class="text-xl font-bold">User Pembeli</p>
                <p class="text-3xl ms-6 font-bold">1000</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-regular fa-user fa-3x"></i>
            <div>
                <p class="text-xl font-bold">User Penjual</p>
                <p class="text-3xl ms-6 font-bold">1000</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
        <i class="fas fa-solid fa-box fa-3x"></i>
            <div>
                <p class="text-xl font-bold ms-4">Total Produk</p>
                <p class="text-3xl ms-7 font-bold">1000+</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-solid fa-list-ul fa-3x"></i>
            <div>
                <p class="text-xl font-bold ms-4">Total Transaksi</p>
                <p class="text-3xl ms-10 font-bold">1000+</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-regular fa-mobile fa-3x"></i>
            <div>
                <p class="text-xl ms-4 font-bold">Brand</p>
                <p class="text-3xl ms-6 font-bold">22</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-truck fa-3x"></i>
            <div>
                <p class="text-xl font-bold">Expedisi</p>
                <p class="text-3xl ms-6 font-bold">7</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-solid fa-tv fa-3x"></i>
            <div>
                <p class="text-xl font-bold ms-4">Iklan</p>
                <p class="text-3xl ms-6 font-bold">30</p>
            </div>
        </div>
    </div>
    <div class="px-12 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
        <div class="flex justify-center items-center gap-2">
                <i class="fas fa-regular fa-envelope fa-3x"></i>
            <div>
                <p class="text-xl font-bold ms-4">Pesan</p>
                <p class="text-3xl ms-6 font-bold">30</p>
            </div>
        </div>
    </div>
</div>

</div>
<div class="pt-10 ps-40">
    <p class="ms-6 text-2xl font-bold text-black">Baru Bergabung</p>
    <div class="flex justify-around mt-6 mx-12">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Username
            </th>
            <th scope="col" class="px-6 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                Kategori User
            </th>
            <th scope="col" class="px-6 py-3">
                No. Hp
            </th>
            <th scope="col" class="px-6 py-3">
                Alamat 
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="{{ asset('images/imgRiski/1Iphone113.jpg') }}" alt="">
                <div class="pl-3">
                    <div class="text-base font-semibold">seftrals</div>
                </div>
            </th>
            <td class="px-6 py-4">
                seftrals@gmail.com
            </td>
            <td class="px-6 py-4">
                Penjual            
            </td>
            <td class="px-6 py-4">
                089613997112
            </td>
            <td class="px-6 py-4">
                jambi selatan
            </td>
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection