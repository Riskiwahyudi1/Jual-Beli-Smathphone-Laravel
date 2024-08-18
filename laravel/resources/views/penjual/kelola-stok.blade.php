@if(session()->has('success'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
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
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Kelola Stok</p>
    

    <form action="/kelola-stok">
        <div class="flex justify-center mt-4">
            <div class="relative w-1/3">
                <input type="text" value="{{ request('search') }}" name="search" class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200" placeholder="Cari Produk ...">
                <button type="submit" class="absolute top-1 right-1 p-2">
                    <svg class="text-gray-600 h-5 w-5 fill-current dark:text-gray-100"
                        viewBox="0 0 56.966 56.966"
                        style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        
</form>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8"> <!-- Tambahkan margin atas -->
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class=" py-3">No</th>
                <th scope="col" class=" py-3">Id Produk</th>
                <th scope="col" class=" py-3">Produk</th>
                <th scope="col" class=" py-3">Harga</th>
                <th scope="col" class=" py-3">Brand</th>
                <th scope="col" class=" py-3">Stok</th>
                <th scope="col" class=" py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @if (!request()->has('search'))
            
            @if (count($produks) > 0)
                
            @foreach ($produks as $index => $produk)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-4 py-4">{{ $index + 1 }}</td>
                <td class=" py-4">{{ $produk->id }}</td>
                <th scope="row" class="flex items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 mr-2" src="{{ asset(json_decode($produk->foto)[0]) }}" alt="">
                    <div class="">
                        <div class="truncate w-[600px]">{{ $produk->nama_produk }}</div>
                    </div>
                </th>
                <td class=" py-4">Rp.{{ number_format($produk->harga,0,',','.') }}</td>
                <td class=" py-4">{{ $produk->brand }}</td>
                <td class=" py-4 {{ $produk->stok <= 5 ? ' text-red-600 font-bold underline': '' }}">{{ $produk->stok }}</td>
                <td class=" py-4">
                    <button><i data-modal-target="tambah-modal{{ $produk->id}}" data-modal-toggle="tambah-modal{{ $produk->id }}" class=" text-green-600 fas fa-circle-plus"></i></button>
                    <button><i data-modal-target="edit-modal{{ $produk->id}}" data-modal-toggle="edit-modal{{ $produk->id }}" class="text-yellow-500 ms-2 fas fa-pen"></i></button>
                    
                </td>
                
            </tr>
             {{-- modal konfirmasi produk --}}          
             <div id="edit-modal{{ $produk->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Edit stok produk 
                            </h3>
                            
                            </div>
                            <!-- Modal body -->
                            
                            <form action="kelola-stok-edit" method="post" enctype="multipart/form-data">
                                @csrf
                                <p class="font-bold text-red-600 my-3 text-lg text-center">Produk Id : {{ $produk->id }}</p>
                            
                            <div class="mx-4 my-4 ">
                                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit Stok:</label>
                                <input type="number" value="{{ $produk->stok }}"  name="edit-stok[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah" required/>
                                <input type="hidden"  name="produk-id" value="{{ $produk->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah" required/>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="edit-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-600 rounded-lg border ">Batal</button>
                            <button  type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-green-600 rounded-lg border ">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal tambah stok produk --}}          
            <div id="tambah-modal{{ $produk->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Tambah stok produk 
                            </h3>
                            
                            </div>
                            <!-- Modal body -->
                            
                            <form action="kelola-stok-tambah" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="mx-4 my-4 ">
                                <p class="font-bold text-red-600 my-3 text-lg text-center">Produk Id : {{ $produk->id }}</p>
                                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambah Stok Produk :</label>
                                <input type="number"  name="tambah-stok[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah" required/>
                                <input type="hidden"  name="produk-id" value="{{ $produk->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah Penambahan" required/>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="tambah-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-600 rounded-lg border ">Batal</button>
                                <button  type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-green-600 rounded-lg border ">Tambah</button>
                                
                            </form>
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
        @elseif( request()->has('search') )
            @if (count($produks) > 0)
                
            @foreach ($produks as $index => $produk)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-4 py-4">{{ $index + 1 }}</td>
                <td class=" py-4">{{ $produk->id }}</td>
                <th scope="row" class="flex items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 mr-2" src="{{ asset(json_decode($produk->foto)[0]) }}" alt="">
                    <div class="">
                        <div class="w-96">{{ $produk->nama_produk }}</div>
                    </div>
                </th>
                <td class=" py-4">Rp.{{ number_format($produk->harga,0,',','.') }}</td>
                <td class=" py-4">{{ $produk->brand }}</td>
                <td class=" py-4">{{ $produk->stok }}</td>
                <td class=" py-4">
                    <button><i data-modal-target="tambah-modal{{ $produk->id}}" data-modal-toggle="tambah-modal{{ $produk->id }}" class=" text-green-600 fas fa-circle-plus"></i></button>
                     <button><i data-modal-target="edit-modal{{ $produk->id}}" data-modal-toggle="edit-modal{{ $produk->id }}" class="text-yellow-500 ms-2 fas fa-pen"></i></button>
                     
                </td>
                
            </tr>
             {{-- modal konfirmasi produk --}}          
             <div id="edit-modal{{ $produk->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Edit stok produk 
                            </h3>
                            
                            </div>
                            <!-- Modal body -->
                            
                            <form action="kelola-stok-edit" method="post" enctype="multipart/form-data">
                                @csrf
                                <p class="font-bold text-red-600 my-3 text-lg text-center">Produk Id : {{ $produk->id }}</p>
                            
                            <div class="mx-4 my-4 ">
                                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit Stok:</label>
                                <input type="number" value="{{ $produk->stok }}"  name="edit-stok[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah" required/>
                                <input type="hidden"  name="produk-id" value="{{ $produk->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah" required/>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="edit-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-600 rounded-lg border ">Batal</button>
                            <button  type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-green-600 rounded-lg border ">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal tambah stok produk --}}          
            <div id="tambah-modal{{ $produk->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Tambah stok produk 
                            </h3>
                            
                            </div>
                            <!-- Modal body -->
                            
                            <form action="kelola-stok-tambah" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="mx-4 my-4 ">
                                <p class="font-bold text-red-600 my-3 text-lg text-center">Produk Id : {{ $produk->id }}</p>
                                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambah Stok Produk :</label>
                                <input type="number"  name="tambah-stok[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah" required/>
                                <input type="hidden"  name="produk-id" value="{{ $produk->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Jumlah Penambahan" required/>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="tambah-modal{{ $produk->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-600 rounded-lg border ">Batal</button>
                                <button  type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-green-600 rounded-lg border ">Tambah</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="px-6 py-10 text-center font-bold text-red-500">
                    Produk yang anda cari tidak ditemukan !
                </td>
            </tr>
            @endif

            @endif
        </tbody>
    </table>
</div>
<div class=" my-5 inset-x-0  flex justify-center">
    {{ $produks->links() }}
</div>
@endsection
