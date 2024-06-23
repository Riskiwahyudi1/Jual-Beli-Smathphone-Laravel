@extends('layouts.main-penjual')
@section('container-penjual')
<div class="ms-44">
    <p class="text-2xl font-bold pt-16">Detail Produk</p>
    <div class="px-8">
        <div class="mt-6">
            <label for="" class="font-bold">Nama Produk :</label>
            <p class="ms-4">{{ $produk->nama_produk }}</p>
        </div>
        <hr class="bg-gray-600 border-2 my-3">
        <div class="">
            <label for="" class="font-bold">Harga Produk :</label>
            <p class="ms-4">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
        </div>
        <hr class="bg-gray-600 border-2 my-3">
        <div>
            <label for="" class="font-bold">deskripsi Produk :</label>
            <p class="ms-4">{!! nl2br($produk->deskripsi) !!}</p>
        </div>
        <hr class="bg-gray-600 border-2 my-3">
        <div>
            <label for="" class="font-bold">Spesifikasi Produk :</label>
            <div class="flex justify-between ms-4 mt-2">
                <div>
                    <p class="font-semibold">Prosesor : <span class="font-normal">{{ $spesifikasi['prosesor'] }}</span></p>
                    <p class="font-semibold">Dimensi : <span class="font-normal">{{ $spesifikasi['dimensi'] }}</span></p>
                    <p class="font-semibold">Resolusi : <span class="font-normal">{{ $spesifikasi['resolusi'] }}</span></p>
                </div>
                <div>
                    <p class="font-semibold">Ram/Rom : <span class="font-normal">{{ $spesifikasi['ram_rom'] }}</span></p>
                    <p class="font-semibold">Berat : <span class="font-normal">{{ $spesifikasi['berat'] }}</span></p>
                    <p class="font-semibold">Layar : <span class="font-normal">{{ $spesifikasi['layar'] }}</span></p>
                </div>
                <div>
                    <p class="font-semibold">Baterai : <span class="font-normal">{{ $spesifikasi['baterai'] }}</span></p>
                    <p class="font-semibold">Pengisi Daya : <span class="font-normal">{{ $spesifikasi['pengisi_daya'] }}</span></p>
                    <p class="font-semibold">Tipe Layar : <span class="font-normal">{{ $spesifikasi['tipe_layar'] }}</span></p>
                </div>
            </div>
        <div>
        <hr class="bg-gray-600 border-2 my-3">
        <label for="" class="font-bold">Detail Lainnya :</label>
        <div class=" ms-4 mt-2">
            <p class="font-semibold">Brand Produk : <span class="font-normal">{{ $produk->brand}}</span></p>
            <p class="font-semibold">Stok Saat Ini : <span class="font-normal">{{ $produk->stok }} pcs</span></p>
            <p class="font-semibold">Jumlah Terjual : <span class="font-normal">{{ $produk->terjual }} pcs</span></p>
            <p class="font-semibold">Diskon : <span class="font-normal">{{ $produk->diskon }} %</span></p>
        </div>
        </div>
        <hr class="bg-gray-600 border-2 my-3">
        <label for="" class="font-bold">Foto Produk :</label>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-3">
            @foreach ($fotos as $foto)
            <div>
                <img class="h-auto max-w-full rounded-lg border-2 bg-gray-600" src="{{ asset($foto) }}" alt="">
            </div>
            @endforeach
            
        </div>

        </div>
        <hr class="bg-gray-600 border-2 mt-3 mb-12">
    </div>
</div>
@endsection
