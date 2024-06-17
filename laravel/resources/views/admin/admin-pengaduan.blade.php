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
            <p>Pesan</p>
        </div>
    </div>
</div>

<p class="ms-6 mt-12 text-2xl font-bold text-black gap-6">Daftar Pengaduan</p>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Kategori User
            </th>
            <th scope="col" class="px-6 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Pengaduan
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
                Budire
            </td>
            <td class="px-6 py-4">
                Pembeli
            </td>
            <td class="px-6 py-4">
                Budire@gmail.com
            </td>
            <td class="px-6 py-4">
                Masalah Akun
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