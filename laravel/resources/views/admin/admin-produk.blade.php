@if(session()->has('verifikasi-sukses'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid mr-3 mt-1 fa-circle-exclamation"></i>
        {{-- <span class="sr-only">Info</span> --}}
        <div>
            <span class="font-medium">{{ session('verifikasi-sukses') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('penolakan-sukses'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-red-600 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid mr-3 mt-1 fa-circle-exclamation"></i>
        {{-- <span class="sr-only">Info</span> --}}
        <div>
            <span class="font-medium">{{ session('penolakan-sukses') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Produk</p>

    <div class="flex justify-center mb-10 mt-10"> 
        <div>
            <div class="mr-10">
            <select id="status-produk"
                    class=" text-black text-sm rounded-lg  block p-2.5 dark:text-black">
                    <option selected>Status Produk</option>
                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                    <option value="Terverivikasi">Terverivikasi</option>
                </select>
            </div>

        </div>
        <div class="relative w-1/3 "> 
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
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Id Produk</th>
                <th scope="col" class="px-6 py-3">Produk</th>
                <th scope="col" class="px-6 py-3">Harga</th>
                <th scope="col" class="px-6 py-3">Penjual</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (!request()->has('search'))
                
            @foreach ($produks as $index=>$produk)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4">{{$produk->id}}</td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="h-8 w-8 mr-3" src="{{ asset(json_decode($produk->foto)[0]) }}" alt="image description">
                    <div class="pl-3">
                        <div class="truncate w-96">{{$produk->nama_produk}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">Rp.{{number_format($produk->harga,0,',','.')}}</td>
                <td class="px-6 py-4">{{$produk->user->username}}</td>
                <td class="px-6 py-4">
                    @if ($produk->status == 'Menunggu  Verifikasi')
                    <button data-modal-target="verifikasi-modal{{ $produk->id }}" data-modal-toggle="verifikasi-modal{{ $produk->id }}" type="button"
                        class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Verify</button>
                        <button data-modal-target="tolak-modal{{ $produk->id }}" data-modal-toggle="tolak-modal{{ $produk->id }}" type="button"
                            class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-red-900 font-bold">Tolak</button>  
                        <a href="/admin-detail-produk/{{ $produk->id}}"
                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Detail</a>
                    @elseif ($produk->status == 'Terverifikasi')
                    <button data-modal-target="tolak-modal{{ $produk->id }}" data-modal-toggle="tolak-modal{{ $produk->id }}" type="button"
                        class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-red-900 font-bold">Tolak</button>  
                        <a href="/admin-detail-produk/{{ $produk->id}}"
                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Detail</a>
                    @elseif ($produk->status == 'Pengajuan Ditolak')
                        <a href="/admin-detail-produk/{{ $produk->id}}"
                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Detail</a>
                    @endif
                </td>
            </tr>
            {{-- modal verifikasi produk --}}
            <div id="verifikasi-modal{{ $produk->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin memverifikasi produk ini?</h3>
                            <form action="admin-produk-verifikasi" method="post">
                                @csrf
                                
                                <input type="hidden" name="produk-id[]" value="{{ $produk->id }} ">
                                <button data-modal-hide="verifikasi-modal" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Verifikasi
                                </button>
                            </form>
                            <button data-modal-hide="verifikasi-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal tolak produk --}}
            <div id="tolak-modal{{ $produk->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin Menolak Pengajuan penjualan produk ini?</h3>
                            <form action="admin-produk-tolak" method="post">
                                @csrf
                                <input type="hidden" name="produk-id[]" value="{{ $produk->id }} ">
                                <button data-modal-hide="verifikasi-modal" type="submit" class="text-white bg-red-600 hover:bg-res-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Tolak
                                </button>
                            </form>
                            <button data-modal-hide="tolak-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </tbody>
    </table>

</div>
@endsection
