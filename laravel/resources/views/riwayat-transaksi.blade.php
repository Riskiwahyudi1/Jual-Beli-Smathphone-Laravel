@if(session()->has('berhasil'))
<div class="flex justify-center">

    <div class="absolute z-30 flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('berhasil') }}
            </div>
        </div>
</div>
@elseif(session()->has('pembatalan-sukses'))
<div class="flex justify-center">
    <div class=" absolute w-1/4 mt-2 flex items p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
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
@elseif(session()->has('bukti-pembayaran-success'))
<div class="flex justify-center">
    <div class=" absolute w-1/4 mt-2 flex items p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('bukti-pembayaran-success') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main')
@section('container')
<nav class="bg-gray-100 rounded-lg dark:bg-gray-700 top-20 left-0 right-0 w-5/6 z-30 mx-auto fixed">
    <div class="px-4 py-3">
        <div class="flex items-center justify-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                @foreach ($status as $s)
                <li>
                    <div class="{{ request('status') === $s ? '  border-gray-500 border-b-2 px-1 text-blue2 font-bold' : 'text-gray-400' }} ">
                        @if ($s === 'menunggu-pembayaran')
                        <i class="fas fa-hourglass-start"></i>                      
                        @elseif($s === 'dikemas')
                        <i class="fas fa-box"></i>                      
                        @elseif($s === 'dikirim')
                        <i class="fas fa-truck"></i>                      
                        @elseif($s === 'selesai')
                        <i class="fas fa-check"></i>                      
                        @elseif($s === 'dibatalkan')
                        <i class="fas fa-ban"></i>                      
                        @endif
                        <a href="/riwayat-transaksi?status={{ $s }}" class="{{ request('status') === $s ? ' text-blue1 font-bold' : 'text-gray-400' }} " aria-current="page">{{ ucwords(str_replace('-', ' ', $s)) }}
                        </a>
                        
                    </div>
                </li>                
                @endforeach
            </ul>          
        </div>
    </div>
</nav>
<div class="overflow-x-auto w-3/4  mx-auto mt-20 mb-20">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-10 py-3">
                    Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Total pembayaran
                </th>
                <th scope="col" class="px-4 py-3">
                    Penjual
                </th>
                @if (request()->query('status') == 'menunggu-pembayaran')
                <th scope="col" class="px-4 py-3">
                    Batas Pembayaran
                </th>
                @elseif(request()->query('status') !== 'menunggu-pembayaran' && request()->query('status') !== 'dibatalkan')
                <th scope="col" class="px-4 py-3">
                    Expedisi Pengiriman
                </th>
                @endif
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
        </thead>
        
        <tbody>
        {{-- @if ($transaksis->count() > 0) --}}
        @foreach ($transaksis as $penjual => $transaksiListByTime)
            @foreach ($transaksiListByTime as $createdAt => $transaksiList)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                        <img class="h-10 w-10 mr-4 ms-4" src="{{ asset('images/imgRiski/'. json_decode($transaksiList->first()->produk->foto)[0]) }}" alt="image description">

                        <div>
                            <p class="truncate w-56">{{ $transaksiList->first()->produk->nama_produk }}</p>
                            <small class="text-gray-500">Jumlah : {{ $transaksiList->first()->jumlah }} Pcs</small>
                            @if($transaksiList->count() > 1)
                                <div class="hidden multi-transaksi">
                                    @foreach ($transaksiList->slice(1) as $transaksi)
                                        <div class="flex mt-2">
                                            <img class="h-auto w-8 mr-3" src="{{ asset('images/imgRiski/'. json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
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
                    <td class="px-6 py-4">
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
                    <td class="px-4 py-4">
                        {{ $penjual }}
                    </td>
                    @if (request()->query('status') == 'menunggu-pembayaran')
                    <td class="px-4 py-4 text-red-500 font-medium">
                        {{ \Carbon\Carbon::parse($createdAt)->addDay()->format('d/m/Y H:i') }}
                    </td>
                    @elseif(request()->query('status') !== 'menunggu-pembayaran' && request()->query('status') !== 'dibatalkan')
                    <td class="px-4 py-4">
                        JNT Express
                    </td>
                    @endif
                    <td class=" px-6 py-4 gap-2">
                        @if (request()->query('status') == 'menunggu-pembayaran')
                            @if($transaksiList->first()->bukti_pembayaran === null)
                                <button data-modal-target="bukti-transaksi{{ $transaksiList->first()->id}}" data-modal-toggle="bukti-transaksi{{ $transaksiList->first()->id}}" class="px-2 py-2 bg-blue2 rounded-md text-white">Upload bukti Pembayaran</button>
                                <button data-modal-target="popup-modal{{ $transaksiList->first()->id}}" data-modal-toggle="popup-modal{{ $transaksiList->first()->id}}" class="px-2 py-2 bg-red-500 rounded-md text-white">Batalkan</button>
                                <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                            @else
                                <button data-modal-target="bukti-transaksi-file{{ $transaksiList->first()->id}}" data-modal-toggle="bukti-transaksi-file{{ $transaksiList->first()->id}}" class="px-2 py-2 rounded-md text-blue2">Lihat Bukti Pembayaran</button>
                                <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                            @endif
                        @elseif(request()->query('status') == 'dikemas')
                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                        @elseif(request()->query('status') == 'dikirim')
                        <button class="px-2 py-2 bg-green-500 rounded-md text-white">Produk Diterima</button>
                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                        @elseif(request()->query('status') == 'selesai')
                        <button class="px-2 py-2 bg-blue2 rounded-md text-white">Beri Komentar</button>
                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                        <button class="px-2 py-2 bg-yellow-400 rounded-md text-white">Cetak Invoice</button>
                        @elseif(request()->query('status') == 'dibatalkan')
                        <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                        @endif
                        
                    </td>
                </tr>
                {{-- Modal detail transaksi --}}
                <div id="default-modal{{ $transaksiList->first()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Rincian Transaksi Anda 
                                </h3>
                                
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-1">
                                <div>
                                    <p class="text-md font-semibold flex justify-end italic">Tanggal :  <span class="text-blue2"> {{ \Carbon\Carbon::parse($createdAt)->format('d/m/Y H:i') }}</span></p>
                                </div>
                                <div>
                                    <p class="text-md font-semibold">Produk :</p>
                                    @foreach ($transaksiList as $transaksi)
                                    <div class="flex my-2">
                                        <img class="h-8 w-8 mr-3" src="{{ asset('images/imgRiski/'. json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
                                        <div>
                                            <p class="ms-1 font-semibold">{{ $transaksi->produk->nama_produk }}</p>
                                            <small class="ms-1">Jumlah : <span class="text-blue2">{{ $transaksi->jumlah }} Pcs</span> </small><br>
                                            <small class="ms-1">Total Harga : <span class="text-blue2"> Rp. {{ number_format($transaksi->produk->harga - $transaksi->produk->diskon / 100 * $transaksi->produk->harga, 0, ',', '.') }}</span></small>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div>
                                    <p class="text-md font-semibold">Penjual :</p>
                                    <div>
                                        <p class="ms-4 italic">{{ $penjual }}</p>
                                    </div>
                                </div>
                                @if(request()->query('status') !== 'dibatalkan')
                                <div>
                                    <p class="text-md font-semibold">Expedisi Pengiriman:</p>
                                    <div>
                                        <p class="ms-4 italic">JNT Express</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-md font-semibold">Status Transaksi :</p>
                                    <div>
                                        <p class="ms-4 italic">{{ $transaksiList->first()->status }}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-md font-semibold">Ongkos Pengiriman :</p>
                                    <div>
                                        <p class="ms-4 italic text-blue2">Rp.{{ number_format($transaksiList->first()->ongkir, 0, ',', '.') }}</p>
                                    </div>
                                </div>
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
                {{-- Modal upload bukti pembayaran --}}
                <div id="bukti-transaksi{{ $transaksiList->first()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Kirim Bukti Pembayaran 
                                </h3>
                                
                                </div>
                                <!-- Modal body -->
                                <form action="riwayat-transaksi" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($transaksiList as $transaksi)
                                    <input type="file" name="bukti-transaksi[]">
                                    <input type="hidden" name="status-transaksi[]" value="menunggu-verifikasi">
                                    <input type="hidden" name="transaksi-id[]" value="{{ $transaksi->id }}">
                                @endforeach
                                <!-- Modal footer -->
                                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="bukti-transaksi{{ $transaksiList->first()->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-red-500 rounded-lg border ">Batal</button>
                                <button  type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white  bg-blue2 rounded-lg border ">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal bukti pembayaran  --}}
                <div id="bukti-transaksi-file{{ $transaksiList->first()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            
                            <img class="h-full w-full mr-3" src="{{ asset('images/buktiPembayaran/'. $transaksiList->first()->bukti_pembayaran) }}" alt="image description">
                                
                            
                        </div>
                    </div>
                </div>
                {{-- modal pembatalan produk --}}          
                <div id="popup-modal{{ $transaksiList->first()->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin membatalkan transaksi ini?</h3>
                                <form action="riwayat-transaksi-batalkan" method="post">
                                    @csrf
                                    @foreach ($transaksiList as $transaksi)
                                    <input type="hidden" name="transaksi[]" value="{{ $transaksi->id }} ">
                                @endforeach
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Ya, Batalkan
                    </button>
                </form>
                <button data-modal-hide="popup-modal{{ $transaksiList->first()->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
    
            @endforeach
        @endforeach
    
        </tbody>
    </table>
</div>

@endsection
