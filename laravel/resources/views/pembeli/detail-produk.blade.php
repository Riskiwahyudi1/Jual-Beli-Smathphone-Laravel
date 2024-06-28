@if(session()->has('success'))
<div class="flex justify-center">
    <div class=" absolute w-1/4 mt-2 flex items p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
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
        @elseif(session()->has('info'))
    <div class="flex justify-center">
        <div class=" absolute w-1/4 flex items p-4 mb-4 text-sm text-yellow-600 rounded-lg bg-yellow-200 dark:bg-gray-800 dark:text-yellow-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">{{ session('info') }}
        </div>
    </div>
</div>
@endif
@extends('layouts.main')
@section('container')
<div class="grid grid-cols-1 gap-10 p-4 bg-white rounded-lg  xl:grid-cols-2 xl:mx-32">
    @if ($getDetail->diskon > 0)
    <div class="grid gap-4 ">
        <div>
            <div class="font-bold text-white bg-blue2  text-sm px-4 absolute rounded-tl-lg rounded-br-lg py-2 lg:w-1/12">{{ $getDetail->diskon }}% OFF</div>
            <img class="w-[600px] h-96 rounded-lg " id="imgZoom" src="{{ asset($fotos[0]) }}" alt="">
        </div>
        <div class="grid grid-cols-5 gap-4">
            @foreach ($fotos as $foto)
            <div>
                <img class="w-[200px] h-[100px] rounded-lg imgSmall cursor-pointer" src="{{ asset($foto) }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
    <div class="">
        <h1 class="font-bold text-lg ">{{ $getDetail->nama_produk }}</h1>
        <div class="flex justify-star mb-10 mt-2">
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
        </div>
        <div class="flex justify-star my-2 gap-3">
            <p class="text-red-400 font-bold text-lg">Rp.{{ number_format($getDetail->harga - $getDetail->diskon / 100 * $getDetail->harga , 0, ',', '.') }}</p>
            <small class="text-blue2 font-semibold line-through text-sm">Rp.{{ number_format($getDetail->harga, 0, ',', '.') }}</small>
        </div> 
    @else
        
    <div class="grid gap-4 ">
        <div>
            <img class="w-[600px] h-96 rounded-lg " id="imgZoom" src="{{ asset($fotos[0]) }}" alt="">
        </div>
        <div class="grid grid-cols-5 gap-4 ">
            @foreach ($fotos as $foto)
            <div>
                <img class="w-[200px] h-[100px] rounded-lg imgSmall cursor-pointer" src="{{ asset($foto) }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
    <div class="">
        <h1 class="font-bold text-lg ">{{ $getDetail->nama_produk }}</h1>
        <div class="flex justify-star mb-10 mt-2">
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
        </div>
        <p class="text-lg font-bold text-blue1 mb-6">Rp.{{ number_format($getDetail->harga, 0, ',', '.')}}</p>
        {{-- <p>terjual: {{ number_format($getDetail->terjual, 0, ',', '.')}}</p> --}}
    @endif
        <div>
            <select  name="warna" class="w-1/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" disabled selected>--Pilih Warna--</option>
                <option value="Gray">Gray</option>
                <option value="Putih">Putih</option>
                <option value="Merah">Merah</option>
                <option value="silver">silver</option>
            </select>
        </div>
        <div class="flex-col mt-4 mb-4 xl:justify-star">
            
            <form action="/tambah-keranjang" method="post">
                @csrf
                <!-- Input hidden untuk menyimpan ID produk -->
                <input type="hidden" name="produk_id" value="{{ $getDetail->id }}">
                <div class="flex justify-star">
                    <button type="submit" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4 ">Tambahkan Ke Keranjang</button>
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Beli Sekarang</button>
                </div>
            </form>
            <form action="/checkout" method="post">
            @csrf
                <input type="hidden" name="check-produk[]" id="" class="check-produk mt-3" value="{{ $getDetail->id }}" checked>
                <input type="hidden" name="jumlah[]" value="1" class="jml-checkout">

                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg  text-gray-900 font-semibold dark:text-gray-400">Beli Produk "<span class="text-blue2 font-bold">{{ $getDetail->nama_produk }}</span>" sekarang??</h3>
                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Ya
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-600 rounded-lg border border-gray-200 hover:bg-red-700 hover:text-gray-700 focus:z-10">Batalkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
    
            </form>
            
        </div>
        <small class="font-bold ">Kategori : <span class="text-gray-400">{{ $getDetail->kategori->nama }}</span></small><br>
        <small class="font-bold">Brand : <span class="text-gray-400"> {{ $getDetail->brand }}</span></small>
        <hr class="h-px mt-3  bg-gray-300 border-0 dark:bg-gray-700 ">

        <div class="flex justify-star">
            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-12 rounded-full h-12 mt-6">
            <div>
                <p class="mt-6 ms-4 text-lg font-bold">{{ $getDetail->user->username }}</p>
                <div class="flex justify-star">
                    <small class="font-bold ms-4 text-blue2">Produk : <span class="text-gray-500 font-semibold"> 456</span></small>
                    <small class="font-bold ms-4 text-blue2">Penjualan : <span class="text-gray-500 font-semibold"> 1562</span></small>
                    <small class="font-bold ms-4 text-blue2">Penilaian : <span class="text-gray-500 font-semibold"> 4.9</span></small>
                </div>
            </div>
        </div>
        <button type="submit" class="mt-4  text-blue2 ring-2 ring-blue2 hover:bg-gray-100 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center">Kunjungi Toko</button>
    </div>
</div>
<div class="flex justify-star mt-6 mb-6 ms-32">
    <h1 class="text-xl font-bold border-b-4 px-1 rounded-sm border-blue2">SPESIFIKASI</h1>
</div> 
<div class="grid grid-cols-2 gap-5 ms-32 lg:grid-cols-3">
    <small class="font-bold">Prosesor : <span class="text-gray-400"> {{ $spesifikasi['prosesor'] }}</span></small>
    <small class="font-bold">RAM/ROM : <span class="text-gray-400"> {{ $spesifikasi['ram_rom'] }}</span></small>
    <small class="font-bold">Baterai : <span class="text-gray-400"> {{ $spesifikasi['baterai'] }}</span></small>
    <small class="font-bold">Dimensi : <span class="text-gray-400"> {{ $spesifikasi['dimensi'] }}</span></small>
    <small class="font-bold">Berat : <span class="text-gray-400"> {{ $spesifikasi['berat'] }}</span></small>
    <small class="font-bold">Pengisi Daya : <span class="text-gray-400"> {{ $spesifikasi['pengisi_daya'] }}</span></small>
    <small class="font-bold">Resolusi : <span class="text-gray-400">{{ $spesifikasi['resolusi'] }}</span></small>
    <small class="font-bold">Layar : <span class="text-gray-400">{{ $spesifikasi['layar'] }}</span></small>
    <small class="font-bold">Tipe Layar : <span class="text-gray-400"> {{ $spesifikasi['tipe_layar'] }}</span></small>
</div>
<hr class="h-px my-4 mx-32 bg-gray-300 border-0 dark:bg-gray-700 ">
<div class="flex justify-star mt-6 mb-6 ms-32">
    <h1 class="text-xl font-bold border-b-4 px-1 rounded-sm border-blue2">DESKRIPSI </h1>
</div> 
<div class="ms-32">
    <p>{!! nl2br($getDetail->deskripsi) !!}</p>
</div>
<hr class="h-px my-6 mx-32 bg-gray-300 border-0 dark:bg-gray-700 ">
<div class="flex justify-star mt-6 mb-6 ms-32">
    <h1 class="text-xl font-bold border-b-4 px-1 rounded-sm border-blue2">PENILAIAN </h1>
</div> 
<div class="ms-4">
    <div class="flex justify-star mx-32">
        <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-8 rounded-full h-8 ">
        <p class=" ms-4 text-sm font-bold">S.F Trialaka <span class="text-gray-500 font-normal">16-04-2024 </span></p>
    </div>
    <div class="flex justify-star mb-4 mx-44">
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
    </div>
    <div class="flex justify-star mx-32 gap-3">
        <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-12  h-12 ms-12">
        <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-12  h-12">
    </div>
        <p class="font-normal mx-44 my-4 w-1/4">Barang sangat bagus dan pengiriman cepat, respon penjual sangat sangat baik , sudah saya kasih bintang 5</p><br>
</div>




@endsection