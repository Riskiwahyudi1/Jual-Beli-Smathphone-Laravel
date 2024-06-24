@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-4xl font-bold text-black">Pesan</p>

<p class="ms-6 mt-7 text-2xl font-bold text-black gap-6 mb-2">Daftar Pengaduan</p>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
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
            <button>
            <i class="fa-solid mr-3 text-yellow-500 fa-circle-exclamation px-2"> </i>
            </button>
            </td>
        </tr>
    </tbody>
</table>



    </div>
</div>
@endsection