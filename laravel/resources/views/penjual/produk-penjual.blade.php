@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-6 text-3xl font-bold text-black">Produk</p>

    <div class="flex justify-star my-7 gap-56">
        <button type="submit"  class="text-white bg-blue2 ms-10 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid text-white mr-2 fa-circle-plus"></i>Tambah Produk</button>
        <div class="relative w-1/3 ms-10"> 
            <input type="text" name="name"
                class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200"
                placeholder="Cari Produk ...">
            <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100" x="10px" y="10px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                </path>
            </svg>
        </div>
    </div>


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="">
                Id Produk
            </th>
            <th scope="col" class="px-6 py-3">
                Produk
            </th>
            <th scope="col" class="px-6 py-3">
                 Harga
            </th>
            <th scope="col" class="px-6 py-3">
            Status
            </th>
            <th scope="col" class="px-6 py-3">
                Terjual
            </th>
            <th scope="col" class="px-6 py-3">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $index => $produk)
            
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                {{ $index + 1 }}
            </td>
            <td class="px-6 py-4">
                {{ $produk->id }}
            </td>
            <td class="px-6 py-4 ">
                <p class="truncate w-96">{{ $produk->nama_produk }}</p>
                
            </td>
                
            <td class="px-6 py-4">
                Rp. {{ number_format($produk->harga, 0, ',', '.') }}
            </td>
            <td class="px-6 py-4">
                Terverifikasi
            </td>
            <td class="px-6 py-4">
                {{ $produk->terjual }}
            </td>
            
            <td class="px-2 py-4 flex items-center justify-center">
                <i class="text-blue2 fas fa-pen mr-3"></i>
                <i class="fa-regular fa-trash-can mr-3 text-red-600"></i>
                <i class="fa-solid mr-3 text-yellow-500 fa-circle-exclamation"></i>
            </td>

        </tr>
        @endforeach

    </tbody>
    </table>
</div>
@endsection
