@if(session()->has('konfirmasi-sukses'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('konfirmasi-sukses') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('pembatalan-sukses'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('pembatalan-sukses') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-10 text-2xl font-bold text-black">Status Orderan</p>
    <form action="/status-orderan">
        @csrf
        <div class="flex justify-center my-3 gap-56">
            <div class="relative w-1/3 ms-10"> 
                @if (request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}"> 
                    @endif
                <input type="text" name="search"
                    class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200"
                    placeholder="Cari Transaksi ..." value="{{ request('search') }}">
                    <button type="submit">
                        <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100" x="10px" y="10px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                            </path>
                        </svg>
                    </button>
                    
            </div>
        </div>
    </form>

    <div class="flex justify-center gap-20 border-2 py-2 mr-4 rounded-md">
        <div>
            <a href="/status-orderan" class="{{ request()->url() === url('/status-orderan') && !request('status') ? 'text-blue2 font-bold border-gray-400 border-b-2 px-2' : 'text-gray-400' }}">Semua</a>
        </div>
        @foreach ($status as $item)
        <div class="flex justify-center">
            <div>
                <a href="/status-orderan?status={{ $item }}" class="{{ request('status') === $item ? ' text-blue2 font-bold border-gray-400 border-b-2 px-2' : 'text-gray-400' }}">{{ ucwords(str_replace('-', ' ', $item)) }}</a>
            </div>
        </div>   
        @endforeach
 
    </div>
    <p class="ms-12 mt-4 text-xl font-bold text-black">Daftar Transaksi</p>
    <div class="flex justify-around mt-6 mx-12">
        @if (count($transaksis) > 0)
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="">
                    Id Transaksi
                </th>
                <th scope="col" class="px-6 py-3">
                    Produk
                </th>
                <th scope="col" class="px-6 py-3">
                     Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Pembeli
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Transaksi
                </th>
                @if (request()->query('status') == 'menunggu-pembayaran')
                <th scope="col" class="px-6 py-3">
                    status bayar
                </th>   
                @endif
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
    </thead>
    <tbody>
           
                @php
                    $no = 1
                @endphp
                @foreach ($transaksis as $penjual => $transaksiListByTime)
                    @foreach ($transaksiListByTime as $createdAt => $transaksiList)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-3">
                                {{ $no++ }}
                            </td>
                            <td class="px-6 py-3">
                                {{ $transaksiList->first()->id }}
                            </td>
                            <td scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                                <img class="h-10 w-10 mr-4 ms-4" src="{{ asset(json_decode($transaksiList->first()->produk->foto)[0]) }}" alt="image description">

                                <div>
                                    <p class="truncate w-64">{{ $transaksiList->first()->produk->nama_produk }}</p>
                                    <small class="text-gray-500">Jumlah : {{ $transaksiList->first()->jumlah }} Pcs</small>
                                    @if($transaksiList->count() > 1)
                                        <div class="hidden multi-transaksi">
                                            @foreach ($transaksiList->slice(1) as $transaksi)
                                                <div class="flex mt-2">
                                                    <img class="h-8 w-8 mr-3" src="{{ asset(json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
                                                    <div>
                                                        <p class=" text-xs truncate w-64">{{ $transaksi->produk->nama_produk }}</p><br>
                                                        <small class="text-gray-500 ms-1">Jumlah : {{ $transaksi->jumlah }} Pcs</small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div>
                                            <small class="text-blue2 mt-2 cursor-pointer btn-show-list-transaksi">Tampilkan Semua </small><small class="text-blue2 jumlah-transaksi">({{ $transaksiList->count() - 1 }})</small>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            
                            
                            <td class="px-6 py-3">
                                @php
                                                $totalSemuaTransaksi = 0;
                                            @endphp
                                            @foreach ($transaksiList as $transaksi)
                                                @php
                                                    $totalSemuaTransaksi += $transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga *  $transaksi->jumlah ;
                                                @endphp
                                            @endforeach
                                Rp.{{number_format($totalSemuaTransaksi + $transaksi->first()->ongkir, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-3">
                                {{ $transaksiList->first()->user->username }}
                            </td>
                            
                            <td class="px-6 py-3">
                                {{ $transaksiList->first()->created_at->format('d/m/Y H:i')  }}
                            </td>
                            @if (request()->query('status') == 'menunggu-pembayaran')
                                @if($transaksiList->first()->bukti_pembayaran === null)
                                <td class="px-6 py-3 font-semibold text-black">
                                    <p>Belum Bayar</p>
                                </td>
                                @else
                                    <td class="px-6 py-3">
                                        <button data-modal-target="bukti-transaksi-file{{ $transaksiList->first()->id}}" data-modal-toggle="bukti-transaksi-file{{ $transaksiList->first()->id}}" class="text-blue2"><i class="fa-solid fa-eye mr-1"></i> Bukti Pembayaran</button>
                                    </td>
                                @endif 
                            @endif
                            <td class="px-6 py-3">
                                @if (request()->query('status') == 'menunggu-pembayaran')
                                <button data-modal-target="konfirmasi-modal{{ $transaksiList->first()->id}}" data-modal-toggle="konfirmasi-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-check text-green-600 mr-3"></i></button>    
                                <button data-modal-target="batalkan-modal{{ $transaksiList->first()->id}}" data-modal-toggle="batalkan-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-ban text-red-600 mr-3"></i></button>
                                <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                @elseif (request()->query('status') == 'dikemas')
                                <button data-modal-target="kirim-modal{{ $transaksiList->first()->id}}" data-modal-toggle="kirim-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-paper-plane text-blue2 mr-3"></i></button>
                                <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                @else
                                <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                @endif
                            </td>
                        </tr>
                        {{-- Modal detail transaksi --}}
                        <div id="default-modal{{ $transaksiList->first()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-2 md:p-2 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Detail Transaksi  
                                        </h3>
                                        
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:py-2 space-y-1">
                                            <p class="text-md font-semibold flex justify-end italic">Tanggal :  <span class="text-blue2"> {{ \Carbon\Carbon::parse($createdAt)->format('d/m/Y H:i') }}</span></p>
                                        <div>
                                        </div>
                                        <div>
                                            <p class="text-md font-semibold">Produk :</p>
                                            @foreach ($transaksiList as $transaksi)
                                            <div class="flex my-2">
                                                <img class="h-8 w-8 mr-3" src="{{ asset(json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
                                                <div>
                                                    <p class="ms-1 font-semibold">{{ $transaksi->produk->nama_produk }}</p>
                                                    <small class="ms-1">Jumlah : <span class="text-blue2">{{ $transaksi->jumlah }} Pcs</span> </small><br>
                                                    <small class="ms-1">Total Harga : <span class="text-blue2"> Rp. {{ number_format($transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga, 0, ',', '.') }}</span></small>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr class="border-gray-300 py-1">
                                        <div>
                                            <p class="text-md font-semibold">Pembeli :</p>
                                            <div>
                                                <p class="ms-4 italic">{{ $transaksiList->first()->user->username }}</p>
                                            </div>
                                        </div>
                                        <hr class="border-gray-300 py-1">
                                        @if(request()->query('status') !== 'dibatalkan')
                                        <div>
                                            <p class="text-md font-semibold">Expedisi Pengiriman:</p>
                                            <div>
                                                <p class="ms-4 italic">JNT Express</p>
                                            </div>
                                        </div>
                                        <hr class="border-gray-300 py-1">
                                        <div>
                                            <p class="text-md font-semibold">Status Transaksi :</p>
                                            <div >
                                                <p class="ms-4 italic">{{ $transaksiList->first()->status }}</p>
                                            </div>
                                        </div>
                                        <hr class="border-gray-300 py-1">
                                        <div>
                                            <p class="text-md font-semibold">Ongkos Pengiriman :</p>
                                            <div>
                                                <p class="ms-4 italic text-blue2">Rp.{{ number_format($transaksiList->first()->ongkir, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <hr class="border-gray-300 py-1">
                                        <div>
                                            <p class="text-md font-semibold">Alamat Pengiriman:</p>
                                            <div>
                                                @php
                                                    $alamat = json_decode($transaksi->first()->alamat, true);
                                                    $alamatString = implode(', ', $alamat);
                                                @endphp
                                                <p class="ms-4 italic">{{ $alamatString }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        @if(request()->query('status') !== 'dibatalkan')
                                        <div>
                                            @php
                                                $totalSemuaTransaksi = 0;
                                            @endphp
                                            @foreach ($transaksiList as $transaksi)
                                                @php
                                                    $totalSemuaTransaksi += $transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga *  $transaksi->jumlah ;
                                                    
                                                @endphp
                                            @endforeach
                                            <p class="text-md font-semibold">Total Pembayaran : <span class="font-bold text-blue2">Rp.{{number_format($totalSemuaTransaksi + $transaksi->first()->ongkir, 0, ',', '.') }}</span> </p>
                                        </div>
                                        @endif
                                        <button data-modal-hide="default-modal{{ $transaksiList->first()->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-500 rounded-lg border ">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal bukti pembayaran  --}}
                        <div id="bukti-transaksi-file{{ $transaksiList->first()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4  max-w-lg max-h-lg">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    
                                    <img class="h-11/12 w-11/12 mr-3" src="{{ asset('images/buktiPembayaran/'. $transaksiList->first()->bukti_pembayaran) }}" alt="image description">
                                        
                                </div>
                            </div>
                        </div>
                        {{-- modal konfirmasi produk --}}          
                        <div id="konfirmasi-modal{{ $transaksiList->first()->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Konfirmasi pesanan ini?, pastikan pembeli sudah melakukan pembayaran!</h3>
                                        <form action="status-orderan-konfirmasi" method="post">
                                            @csrf
                                            @foreach ($transaksiList as $transaksi)
                                            <input type="hidden" name="transaksi[]" value="{{ $transaksi->id }} ">
                                        @endforeach
                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, Konfirmasi
                            </button>
                        </form>
                        <button data-modal-hide="konfirmasi-modal{{ $transaksiList->first()->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal kirim produk --}}          
                        <div id="kirim-modal{{ $transaksiList->first()->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Konfirmasi Pengiriman Produk?</h3>
                                        <form action="status-orderan-kirim" method="post">
                                            @csrf
                                            @foreach ($transaksiList as $transaksi)
                                            <input type="hidden" name="transaksi[]" value="{{ $transaksi->id }} ">
                                        @endforeach
                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, Konfirmasi
                            </button>
                        </form>
                        <button data-modal-hide="kirim-modal{{ $transaksiList->first()->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal batalkan produk --}}          
                        <div id="batalkan-modal{{ $transaksiList->first()->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Batalkan pesanan ini?</h3>
                                        <form action="status-orderan-batalkan" method="post">
                                            @csrf
                                            @foreach ($transaksiList as $transaksi)
                                            <input type="hidden" name="transaksi[]" value="{{ $transaksi->id }} ">
                                        @endforeach
                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, batalkan
                            </button>
                        </form>
                        <button data-modal-hide="batalkan-modal{{ $transaksiList->first()->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
            
                         @endforeach
                    @endforeach
               
            @elseif( request()->has('search') )
                @if(count($transaksis) > 0)
                    @foreach ($transaksis as $penjual => $transaksiListByTime)
                            @foreach ($transaksiListByTime as $createdAt => $transaksiList)
                                @php
                                    $no = 1
                                @endphp
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-3">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $transaksiList->first()->id }}
                                    </td>
                                    <td scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                                        <img class="h-10 w-10 mr-4 ms-4" src="{{ asset(json_decode($transaksiList->first()->produk->foto)[0]) }}" alt="image description">
            
                                        <div>
                                            <p class="truncate w-56">{{ $transaksiList->first()->produk->nama_produk }}</p>
                                            <small class="text-gray-500">Jumlah : {{ $transaksiList->first()->jumlah }} Pcs</small>
                                            @if($transaksiList->count() > 1)
                                                <div class="hidden multi-transaksi">
                                                    @foreach ($transaksiList->slice(1) as $transaksi)
                                                        <div class="flex mt-2">
                                                            <img class="h-auto w-8 mr-3" src="{{ asset(json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
                                                            <div>
                                                                <small>{{ $transaksi->produk->nama_produk }}</small><br>
                                                                <small class="text-gray-500 ms-1">Jumlah : {{ $transaksi->jumlah }} Pcs</small>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div>
                                                    <small class="text-blue2 mt-2 cursor-pointer btn-show-list-transaksi">Tampilkan Semua </small><small class="text-blue2 jumlah-transaksi">({{ $transaksiList->count() - 1 }})</small>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
            
                                    <td class="px-6 py-3">
                                        @php
                                                        $totalSemuaTransaksi = 0;
                                                    @endphp
                                                    @foreach ($transaksiList as $transaksi)
                                                        @php
                                                            $totalSemuaTransaksi += $transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga *  $transaksi->jumlah ;
                                                        @endphp
                                                    @endforeach
                                        Rp.{{number_format($totalSemuaTransaksi + $transaksi->first()->ongkir, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $transaksiList->first()->user->username }}
                                    </td>
            
                                    <td class="px-6 py-3">
                                        {{ $transaksiList->first()->created_at->format('d/m/Y H:i')  }}
                                    </td>
                                    <td class="px-6 py-3">
                                        @if (request()->has('search') && request()->query('status') == 'menunggu-pembayaran')
                                        <button data-modal-target="konfirmasi-modal{{ $transaksiList->first()->id}}" data-modal-toggle="konfirmasi-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-check text-green-600 mr-3"></i></button>    
                                        <button data-modal-target="batalkan-modal{{ $transaksiList->first()->id}}" data-modal-toggle="batalkan-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-ban text-red-600 mr-3"></i></button>
                                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                        @elseif (request()->query('status') == 'dikemas')
                                        <button data-modal-target="kirim-modal{{ $transaksiList->first()->id}}" data-modal-toggle="kirim-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-paper-plane text-blue2 mr-3"></i></button>
                                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                        @elseif (request()->query('status') == 'dikirim')
                                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                        @elseif (request()->query('status') == 'selesai')
                                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                        @elseif (request()->query('status') == 'dibatalkan')
                                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}"  ><i class="fa-solid fa-circle-info text-yellow-500"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                {{-- Modal detail transaksi --}}
                                <div id="default-modal{{ $transaksiList->first()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-2 md:p-2 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Detail Transaksi  
                                                </h3>
            
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:py-2 space-y-1">
                                                    <p class="text-md font-semibold flex justify-end italic">Tanggal :  <span class="text-blue2"> {{ \Carbon\Carbon::parse($createdAt)->format('d/m/Y H:i') }}</span></p>
                                                <div>
                                                </div>
                                                <div>
                                                    <p class="text-md font-semibold">Produk :</p>
                                                    @foreach ($transaksiList as $transaksi)
                                                    <div class="flex my-2">
                                                        <img class="h-8 w-8 mr-3" src="{{ asset(json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
                                                        <div>
                                                            <p class="ms-1 font-semibold">{{ $transaksi->produk->nama_produk }}</p>
                                                            <small class="ms-1">Jumlah : <span class="text-blue2">{{ $transaksi->jumlah }} Pcs</span> </small><br>
                                                            <small class="ms-1">Total Harga : <span class="text-blue2"> Rp. {{ number_format($transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga, 0, ',', '.') }}</span></small>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <hr class="border-gray-300 py-1">
                                                <div>
                                                    <p class="text-md font-semibold">Pembeli :</p>
                                                    <div>
                                                        <p class="ms-4 italic">{{ $transaksiList->first()->user->username }}</p>
                                                    </div>
                                                </div>
                                                <hr class="border-gray-300 py-1">
                                                @if(request()->query('status') !== 'dibatalkan')
                                                <div>
                                                    <p class="text-md font-semibold">Expedisi Pengiriman:</p>
                                                    <div>
                                                        <p class="ms-4 italic">JNT Express</p>
                                                    </div>
                                                </div>
                                                <hr class="border-gray-300 py-1">
                                                <div>
                                                    <p class="text-md font-semibold">Status Transaksi :</p>
                                                    <div>
                                                        <p class="ms-4 italic">{{ $transaksiList->first()->status }}</p>
                                                    </div>
                                                </div>
                                                <hr class="border-gray-300 py-1">
                                                <div>
                                                    <p class="text-md font-semibold">Ongkos Pengiriman :</p>
                                                    <div>
                                                        <p class="ms-4 italic text-blue2">Rp.{{ number_format($transaksiList->first()->ongkir, 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                                <hr class="border-gray-300 py-1">
                                                <div>
                                                    <p class="text-md font-semibold">Alamat Pengiriman:</p>
                                                    <div>
                                                        @php
                                                            $alamat = json_decode($transaksi->first()->alamat, true);
                                                            $alamatString = implode(', ', $alamat);
                                                        @endphp
                                                        <p class="ms-4 italic">{{ $alamatString }}</p>
                                                    </div>
                                                </div>
                                                @endif
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                @if(request()->query('status') !== 'dibatalkan')
                                                <div>
                                                    @php
                                                        $totalSemuaTransaksi = 0;
                                                    @endphp
                                                    @foreach ($transaksiList as $transaksi)
                                                        @php
                                                            $totalSemuaTransaksi += $transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga *  $transaksi->jumlah ;
                                                            
                                                        @endphp
                                                    @endforeach
                                                    <p class="text-md font-semibold">Total Pembayaran : <span class="font-bold text-blue2">Rp.{{number_format($totalSemuaTransaksi + $transaksi->first()->ongkir, 0, ',', '.') }}</span> </p>
                                                </div>
                                                @endif
                                                <button data-modal-hide="default-modal{{ $transaksiList->first()->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-500 rounded-lg border ">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 {{-- modal batalkan transaksi --}}          
                            <div id="konfirmasi-modal{{ $transaksiList->first()->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Batalkan pesanan ini?</h3>
                                            <form action="status-orderan" method="post">
                                                @csrf
                                                @foreach ($transaksiList as $transaksi)
                                                <input type="hidden" name="transaksi[]" value="{{ $transaksi->id }} ">
                                            @endforeach
                                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Batalkan
                                </button>
                            </form>
                            <button data-modal-hide="konfirmasi-modal{{ $transaksiList->first()->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                        
                @else
                <p class=" pt-16 font-bold text-red-500">Belum ada transaksi saat ini!</p>
                @endif
            @endif
            </tbody>
        </table>



    </div>
</div>
@endsection