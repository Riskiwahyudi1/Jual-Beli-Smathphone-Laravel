@if(session()->has('success'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-10 text-2xl font-bold text-black">Produk</p>

<form action="{{ route('produk-penjual.search') }}" method="GET">
    <div class="flex justify-star my-7 gap-56">
        <a href="/tambah-produk-penjual"  class="text-white bg-blue2 ms-10 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid text-white mr-2 fa-circle-plus"></i>Tambah Produk</a>
        <div class="relative w-1/3 ms-10"> 
            <input type="text" name="search"
                class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200"
                placeholder="Cari Produk ..." value="{{ request('search') }}">
                <button type="submit" class="absolute top-1 right-1 p-2">
                    <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100" x="10px" y="10px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                        </path>
                    </svg>

                </button>
        </div>
    </div>
</form>


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
        @if (!isset($query))  
            @if (count($produks) > 0)
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
                            <a href="{{ route('crud-produk.edit', $produk->id) }}"><i class="text-blue2 fas fa-pen mr-3"></i></a>
                            <button type="submit" data-modal-target="popup-modal{{ $produk->id }}" data-modal-toggle="popup-modal{{ $produk->id }}"><i class="fa-regular fa-trash-can mr-3 text-red-600"></i></button>
                            <a href="{{ route('crud-produk.show', $produk->id) }}"><i class="fa-solid mr-3 text-yellow-500 fa-circle-exclamation"></i></a>
                        </td>
                    </tr>
                    <div id="popup-modal{{ $produk->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin menghapus produk ini?</h3>
                                    <form action="{{ route('crud-produk.destroy', $produk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center font-bold text-red-500">
                        Belum ada produk di toko anda !
                    </td>
                </tr>
            @endif
        @elseif(isset($query))
            @if (count($produksSearch) > 0)
                @foreach ($produksSearch as $index => $produk)
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
                            <a href="{{ route('crud-produk.edit', $produk->id) }}"><i class="text-blue2 fas fa-pen mr-3"></i></a>
                            <button type="submit" data-modal-target="popup-modal{{ $produk->id }}" data-modal-toggle="popup-modal{{ $produk->id }}"><i class="fa-regular fa-trash-can mr-3 text-red-600"></i></button>
                            <a href="{{ route('crud-produk.show', $produk->id) }}"><i class="fa-solid mr-3 text-yellow-500 fa-circle-exclamation"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center font-bold text-red-500">
                        Produk yg anda cari tidak ditemukan!
                    </td>
                </tr>
            @endif
        
        @endif
    </tbody>
    </table>
</div>
@endsection
