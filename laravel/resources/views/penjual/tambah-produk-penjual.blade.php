@extends('layouts.main-penjual')
@section('container-penjual')  
<div class="flex justify-center pt-20 ps-44">

    <div class="w-1/2 ">
        <p class="font-bold font mb-4">Tambah Produk Baru :</p>
        <form action="{{ route('crud-produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div >
                <label for="nama-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk :</label>
                <input type="text" name="nama-depan" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama Produk" required />
            </div>
            <div >
                <label for="harga-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Produk :</label>
                <input type="text" name="harga-produk" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan harga Produk" required />
            </div>
            <div class="mb-2">
                <label for="Kategori Produk :" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori Produk :</label>
                <select  name="kategori" class="w-1/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>--Pilih Kategori--</option>
                    <option value="1">Gaming Smartphone</option>
                    <option value="2">Flagship Smartphone</option>
                    <option value="3">Camera Quality</option>
                    <option value="4">Mid Range</option>
                    <option value="5">Low Range</option>
                    </select>
            </div>  
            <div class="mb-2">
                <label for="deskripsi-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk :</label>
                <textarea name="deskripsi-produk" rows="12" class="block p-2.5 w-11/12 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Deskripsi Produk" required></textarea>
            </div>
            
            

    </div>
    <div class="w-1/2 mt-10">
        <div class="grid gap-6 mb-2 md:grid-cols-2">
            
            
            <div>
                <label for="stok-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok :</label>
                <input type="number" name="pengisi-daya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Stok produk"  required />
            </div>
            <div>
                <label for="diskon-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon :</label>
                <input type="number" value="0" name="tipe-layar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tipe Layar"  required />
            </div>
            
        </div>
            <p class="font-semibold mb-2 mt-8">Spesifikasi Produk :</p>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div>
                    <input type="text" name="prosesor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Prosesor" required />
                </div>
                <div>
                    <input type="text" name="dimensi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dimensi" required />
                </div>
                <div>
                    <input type="text" name="resolusi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Resolusi" required />
                </div>
                <div>
                    <input type="text" name="ram-rom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ram/Rom"  required />
                </div>
                <div>
                    <input type="text" name="berat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Berat" required />
                </div>
                <div>
                    <input type="text" name="layar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Layar" required />
                </div>
                <div>
                    <input type="text" name="baterai " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Baterai" required />
                </div>
                <div>
                    <input type="text" name="pengisi-daya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pengisi Daya"  required />
                </div>
                <div>
                    <input type="text" name="tipe-layar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tipe Layar"  required />
                </div>
                
            </div>
            <div>
                <label for="foto-produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambahkan Foto Produk :</label>
                <input class="block w-5/6 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>

            </div>
            <button type="submit">simpan</button>
        </form>
    </div>
</div>

@endsection
