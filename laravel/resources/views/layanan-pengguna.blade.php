@extends('layouts.main')
@section('container')
<body class="font-sans">

<div class="header border-b-2 border-blue-300 text-center py-4">
    <h2 class="underline">Checkout</h2>
</div>

<div class="container max-w-2xl mx-auto px-4 py-8 border border-gray-300 rounded">
    <h3 class="text-lg font-semibold mb-4">Alamat Tagihan</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <input type="text" id="fname" name="fname" placeholder="Nama Depan" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div>
            <input type="text" id="lname" name="lname" placeholder="Nama Belakang" class="w-full p-2 border border-gray-300 rounded">
        </div>
    </div>
    <div>
        <input type="email" id="email" name="email" placeholder="Email" class="w-full p-2 mt-4 border border-gray-300 rounded">
    </div>
    <div>
        <input type="text" id="company" name="company" placeholder="Perusahaan" class="w-full p-2 mt-4 border border-gray-300 rounded">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        <div>
            <input type="text" id="address" name="address" placeholder="Alamat" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div>
            <input type="text" id="city" name="city" placeholder="Kota" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div>
            <input type="text" id="country" name="country" placeholder="Provinsi" class="w-full p-2 border border-gray-300 rounded">
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <input type="text" id="postal" name="postal" placeholder="Kode Pos" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div>
            <input type="text" id="telephone" name="telephone" placeholder="Telepon" class="w-full p-2 border border-gray-300 rounded">
        </div>
    </div>
    <div class="mt-6">
        <a href="your_shopping_cart_page.html" class="text-blue-600 hover:underline">Kembali Ke Kartu Belanja</a>
    </div>
    <div class="flex justify-end mt-6">
        <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">Continue</button>
    </div>
</div>

@endsection