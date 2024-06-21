@if(session()->has('success'))
<div class="flex justify-center">
    <div class=" absolute w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
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
<div class="flex justify-center pt-20 ps-44">

    <div class="w-1/2 ">
        <p class="font-bold font mb-4">Tambah Produk Baru :</p>
        <form action="/crud-produk" method="post" enctype="multipart/form-data">
            @csrf
        
            <div>
                <label for="nama-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk :</label>
                <input type="text" name="nama_produk" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama Produk" />
            </div>
            <div>
                <label for="harga-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Produk :</label>
                <input type="text" name="harga" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan harga Produk" />
            </div>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div class="mb-2">
                    <label for="Kategori Produk :" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori Produk :</label>
                    <select name="kategori_id" class="w-3/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>--Pilih Kategori--</option>
                        <option value="1">Gaming Smartphone</option>
                        <option value="2">Flagship Smartphone</option>
                        <option value="3">Camera Quality</option>
                        <option value="4">Mid Range</option>
                        <option value="5">Low Range</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="Brand :" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand :</label>
                    <select name="brand" class="w-3/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>--Pilih Brand--</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Oppo">OPPO</option>
                        <option value="Nokia">Nokia</option>
                        <option value="Xiomi">Xiomi</option>
                        <option value="Asus">Asus</option>
                    </select>
                </div>

            </div>
            <div class="mb-2">
                <label for="deskripsi-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk :</label>
                <textarea name="deskripsi" rows="12" class="block p-2.5 w-11/12 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Deskripsi Produk"></textarea>
            </div>
    </div>
    <div class="w-1/2 mt-10">
        <div class="grid gap-6 mb-2 md:grid-cols-2">
            <div>
                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok :</label>
                <input type="number" name="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Stok produk" />
            </div>
            <div>
                <label for="diskon-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon :</label>
                <input type="number" value="0" name="diskon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Diskon" />
            </div>
        </div>
        <p class="font-semibold mb-2 mt-8">Spesifikasi Produk :</p>
        <div class="grid gap-6 mb-2 md:grid-cols-2">
            <div>
                <input type="text" name="spesifikasi[prosesor]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Prosesor" />
            </div>
            <div>
                <input type="text" name="spesifikasi[dimensi]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dimensi" />
            </div>
            <div>
                <input type="text" name="spesifikasi[resolusi]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Resolusi" />
            </div>
            <div>
                <input type="text" name="spesifikasi[ram_rom]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ram/Rom" />
            </div>
            <div>
                <input type="text" name="spesifikasi[berat]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Berat" />
            </div>
            <div>
                <input type="text" name="spesifikasi[layar]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Layar" />
            </div>
            <div>
                <input type="text" name="spesifikasi[baterai]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Baterai" />
            </div>
            <div>
                <input type="text" name="spesifikasi[pengisi_daya]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pengisi Daya" />
            </div>
            <div>
                <input type="text" name="spesifikasi[tipe_layar]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tipe Layar" />
            </div>
        </div>
        <div>
            <label for="foto-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambahkan Foto Produk :</label>
            <input name="foto[]" class="block w-5/6 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
</div>

@endsection
