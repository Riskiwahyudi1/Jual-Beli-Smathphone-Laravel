<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
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

<!-- Footer -->
<footer class="bg-black text-white py-8">
    <div class="footer-company text-xl font-bold">TeraPhone</div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
        <div>
            <div class="text-lg font-bold">Link</div>
        </div>
        <div class="md:col-span-2">
            <div class="text-lg font-bold">Tentang Kami</div>
            <div class="text-sm">Pembayaran</div>
            <div class="text-sm">Penjualan Terbaik</div>
            <div class="text-sm">Services</div>
        </div>
        <div>
            <div class="text-lg font-bold">Sosial Media</div>
            <div class="mt-2">
                <span class="text-sm">@TeraPhone</span><br>
                <span class="text-sm">TeraPhone.id</span><br>
                <span class="text-sm">@TeraPhone.id</span><br>
                <span class="text-sm">TeraPhone.id</span>
            </div>
        </div>
        <div>
            <div class="text-lg font-bold">Jadilah Orang Pertama Yang Mengetahuinya!</div>
        </div>
    </div>
    <div class="mt-8 text-sm">
        <div>teraphone@gmail.com</div>
        <div>+62 96-23-10-68-91</div>
        <div>Batam, Kepulauan Riau, Indonesia</div>
    </div>
</footer>

</body>
</html>
