@extends('layouts.main-penjual')
@section('container-penjual')  
<div class="w-1/2 pt-20 ps-44">
    <p class="font-bold font mb-4">Tambah Produk Baru :</p>
    <form action="konfirmasi-checkout" method="post">
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
            <label for="Alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap</label>
            <textarea name="alamat" rows="4" class="block p-2.5 w-11/12 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Jalan Merdeka No. 123, perumahan merdeka blok A No 05, Kelurahan Kebon Jeruk, Kecamatan Kebon Jeruk" required></textarea>
        </div>
        <div class="mb-2">
            <select  name="expedisi" class="w-1/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" disabled selected>Pilih Kurir</option>
                <option value="JNT Express">JNT Express</option>
                <option value="JNE Express">JNE Express</option>
                <option value="Sicepat">Sicepat</option>
                <option value="Ninja Express">Ninja Express</option>
                </select>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                <input type="text" name="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Kota" required />
            </div>
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                <input type="text" name="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Provinsi" required />
            </div>
            <div>
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                <input type="number" name="kode-pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Kode Pos" required />
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                <input type="tel" name="no-hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="No Hp Anda"  required />
            </div>
            
        </div>

</div>
@endsection
