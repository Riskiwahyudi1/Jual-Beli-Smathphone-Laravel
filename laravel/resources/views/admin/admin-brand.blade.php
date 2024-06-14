@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Lainnya</p>

<div class="flex justify-center gap-10 shadow-lg py-4 mt-6 mx-32 rounded-md">
    <div class="flex justify-center">
        <div>
            <p>Brand</p>
        </div>
    </div>
    <div class="flex justify-center">
        <div>
            <p>Expedisi</p>
        </div>

    </div>
    <div class="flex justify-center">
        <div>
            <p>Iklan</p>
        </div>
    </div>
    <div class="flex justify-center">
        <div>
            <p>Pesan</p>
        </div>
    </div>
</div>

<p class="ms-6 mt-12 text-2xl font-bold text-black">Daftar Brand</p>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Id Brand
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Brand
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Ditambahkan
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
                14-06-2024
            </td>
            <td class="px-6 py-4">   
            <button type="submit" class=" ms-5 my-2 text-red-600 text-sm font-medium text-center hidden" id="hapus" name="action" value="hapus"><i class="fas fa-trash mr-1"></i>Hapus Produk</button>
            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:focus:ring-orange-900"></button>
            </td>
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection