@if(session()->has('success'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('error'))
<div class="flex justify-center ">
    <div class=" absolute w-1/4 z-30 flex items mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400" role="alert">
        <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('error') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main-penjual')
@section('container-penjual')  
<form method="POST" action="{{ route('crud-produk.update', ['crud_produk' => $produk->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="flex justify-center pt-20 ps-44">
    <div class="w-1/2 ">
        <p class="font-bold font mb-4">Edit Produk :</p>
            <div>
                <label for="nama-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk :</label>
                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama Produk" required/>
            </div>
            <div>
                <label for="harga-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Produk :</label>
                <input type="number"  name="harga" value="{{ $produk->harga }}" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan harga Produk" required/>
            </div>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div class="mb-2">
                    <label for="Kategori Produk :" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori Produk :</label>
                    <select name="kategori_id" class="w-3/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="{{ $produk->kategori_id }}" selected>{{$produk->kategori->nama}}</option>
                        <option value="1">Gaming Smartphone</option>
                        <option value="2">Flagship Smartphone</option>
                        <option  value="3">Camera Quality</option>
                        <option value="4">Mid Range</option>
                        <option value="5">Low Range</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="Brand :" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand :</label>
                    <select name="brand" class="w-3/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="{{ $produk->brand }}" selected>{{$produk->brand}}</option>
                        <option value="Samsung">Samsung</option>
                        <option value ="Oppo">OPPO</option>
                        <option value="Nokia">Nokia</option>
                        <option value="Xiomi">Xiomi</option>
                        <option value="Asus">Asus</option>
                    </select>
                </div>

            </div>
            <div class="mb-2">
                <label for="deskripsi-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk :</label>
                @php
                $deskripsi = str_replace(['<br>', '<br />'], "\n", $produk->deskripsi);
            @endphp
            
            <textarea name="deskripsi" rows="12" class="block p-2.5 w-11/12 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Deskripsi Produk" required>{{ $deskripsi }}</textarea>
            
            </div>
    </div>
    <div class="w-1/2 mt-10">
        <div class="grid gap-6 mb-2 md:grid-cols-2">
            <div>
                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">stok :</label>
                <input type="number" value="{{ $produk->stok }}"  name="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" Jumlah produk" required/>
            </div>
            <div>
                <label for="diskon-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon :</label>
                <input type="number" value="{{ $produk->diskon }}" name="diskon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" />
            </div>
        </div>
        <p class="font-semibold mb-2 mt-8">Spesifikasi Produk :</p>
        <div class="grid gap-6 mb-2 md:grid-cols-2">
            <div>
                <input type="text"  name="spesifikasi[prosesor]" value=" {{ $spesifikasi['prosesor'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Prosesor" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[dimensi]" value=" {{ $spesifikasi['dimensi'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dimensi" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[resolusi]" value=" {{ $spesifikasi['resolusi'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Resolusi" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[ram_rom]" value=" {{ $spesifikasi['ram_rom'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ram/Rom" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[berat]" value=" {{ $spesifikasi['berat'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Berat" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[layar]" value=" {{ $spesifikasi['layar'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Layar" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[baterai]" value=" {{ $spesifikasi['baterai'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Baterai" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[pengisi_daya]" value=" {{ $spesifikasi['pengisi_daya'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pengisi Daya" required/>
            </div>
            <div>
                <input type="text"  name="spesifikasi[tipe_layar]" value=" {{ $spesifikasi['tipe_layar'] }} " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tipe Layar" required/>
            </div>
        </div>
        <div>
            <label for="foto-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambahkan Foto Produk :</label>
            <input name="foto[]" class="block w-5/6 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple >
            @error('foto.*')
            <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"  class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-5 absolute right-10  ">Simpan</button>
        </form>
</div>
</div>

@endsection 
