@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Lainnya</p>

<div class="flex justify-star gap-10 border-4 py-4 mt-6 rounded-md">
    <div class="flex justify-center ms-4">
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
            <p>Pengaduan</p>
        </div>
    </div>
</div>

<p class="ms-6 mt-12 text-2xl font-bold text-black gap-6">Daftar Brand</p>

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
            <button><i class="text-yellow-500 ms-4 fas fa-pen"></i></button>
            <button><i class="fas fa-solid fa-trash text-red-600 ms-2"></i></button>
            </td>
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection