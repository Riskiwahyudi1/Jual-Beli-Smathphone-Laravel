@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Lainnya</p>

<div class="flex justify-star gap-10 border-4 py-4 mt-6 rounded-md">
    <div class="flex justify-center">
        <div>
            <p>Pengaduan</p>
        </div>
    </div>
</div>

<p class="ms-6 mt-12 text-2xl font-bold text-black gap-6">Daftar Iklan</p>

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
                Harga
            </th>
            <th scope="col" class="px-6 py-3">
                Penjual
            </th>
            <th scope="col" class="px-6 py-3">
                Jumlah
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
            <td class="px-6 py-4">
                1235234
            </td>
            <td class="px-6 py-4">
                Samsung sungA
            </td>
            <td class="px-6 py-4">
                2.300.000
            </td>
            <td class="px-6 py-4">
                Teraphone
            </td>
            <td class="px-6 py-4">
                200
            </td>
            <td>
            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Konfirmasi</button>
            </td>
            <td>
            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</button>
            </td>
            <td class="px-6 py-4">   
            <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300  rounded-full text-md px-1 py-1 me-2 mb-2 dark:focus:ring-yellow-900 font-bold"><i class="fas fa-exclamation"></i></button>
            </td>
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection