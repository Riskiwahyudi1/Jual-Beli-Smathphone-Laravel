@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-20 ps-40">
    <p class="ms-6 text-2xl font-bold text-black">Dashboard</p>
    <div class="grid grid-cols-4 gap-6 mt-6 mx-12">
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-2">
                <i class="fas fa-shopping-bag fa-3x text-blue2"></i>
                <div>
                    <p class="text-xl font-bold">Total Order</p>
                    <p class="text-3xl ms-6 font-bold">{{ $totalTransaksi->count() }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-regular fa-clock fa-3x text-yellow-400"></i>
                <div>
                    <p class="text-xl font-bold">Menunggu</p>
                    <p class="text-3xl ms-6 font-bold">{{ $menungguPembayaran->count() }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-regular fa-box fa-3x text-purple-600"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Dikemas</p>
                    <p class="text-3xl ms-5 font-bold">{{ $dikemas->count() }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-regular fa-paper-plane fa-3x text-blue-500"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Dikirim</p>
                    <p class="text-3xl ms-5 font-bold">{{ $dikirim->count() }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-check fa-3x text-green-700"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Selesai</p>
                    <p class="text-3xl ms-5 font-bold">{{ $selesai->count() }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-ban fa-3x text-red-600"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Dibatalkan</p>
                    <p class="text-3xl ms-5 font-bold">{{ $dibatalkan->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pt-10 ps-40">
    <p class="ms-6 text-2xl font-bold text-black">Transaksi Terbaru</p>
    <div class="flex justify-around mt-6 mx-12">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        @foreach ($totalTransaksi as $transakasi)   
        <tr>
            <th scope="col" class="px-6 py-3">
                {{ $transaksi->produk->nama_produk }}
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Total Harga
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Pembeli
            </th>
            <th scope="col" class="px-6 py-3">
                Alamat Pengiriman
            </th>
            <th scope="col" class="px-6 py-3">
                Detail
            </th>
        </tr>
        @endforeach
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="{{ asset('images/imgRiski/1Iphone113.jpg') }}" alt="">
                <div class="pl-3">
                    <div class="text-base font-semibold">Samsung</div>
                </div>
            </th>
            <td class="px-6 py-4">
                terkirim
            </td>
            <td class="px-6 py-4">
                2.000.000             
            </td>
            <td class="px-6 py-4">
                sesa
            </td>
            <td class="px-6 py-4">
                jambi selatan
            </td>
            <td class="px-6 py-4">
            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300  rounded-full text-md px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 font-extrabold">!</button>
            </td>
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection