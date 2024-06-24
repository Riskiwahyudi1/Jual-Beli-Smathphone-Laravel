@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-20 ps-40 ">
    <p class="ms-6 text-2xl font-bold text-black">Dashboard</p>
    <div class="grid grid-cols-4 gap-6 mt-6 mx-12">
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-2">
                <i class="fas fa-shopping-bag fa-3x text-blue2"></i>
                <div>
                    <p class="text-xl font-bold">Total Order</p>
                    <p class="text-3xl ms-6 font-bold">{{ $totalTransaksi }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-regular fa-clock fa-3x text-yellow-400"></i>
                <div>
                    <p class="text-xl font-bold">Menunggu</p>
                    <p class="text-3xl ms-6 font-bold">{{ $menungguPembayaran }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-regular fa-box fa-3x text-purple-600"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Dikemas</p>
                    <p class="text-3xl ms-5 font-bold">{{ $dikemas }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-regular fa-paper-plane fa-3x text-blue-500"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Dikirim</p>
                    <p class="text-3xl ms-5 font-bold">{{ $dikirim }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fa-solid fa-circle-check text-green-600 fa-3x"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Selesai</p>
                    <p class="text-3xl ms-5 font-bold">{{ $selesai }}</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-8 bg-white-300 rounded-3xl flex justify-center items-center border-4 border-gray-400">
            <div class="flex justify-center items-center gap-1">
                <i class="fas fa-ban fa-3x text-red-600"></i>
                <div>
                    <p class="text-xl font-bold ms-4">Dibatalkan</p>
                    <p class="text-3xl ms-5 font-bold">{{ $dibatalkan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pt-10 ps-40 mb-16">
    <p class="ms-6 text-2xl font-bold text-black">Transaksi Terbaru</p>
    <div class="flex justify-around mt-6 mx-12">
    @if (count($transaksis) > 0)
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Produk
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Total Harga
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Pembeli
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Transaksi
            </th>
            <th scope="col" class="px-6 py-3">
                detail
            </th>
        </tr>
    </thead>
    <tbody>
            @foreach ($transaksis as $penjual => $transaksiListByTime)
                @foreach ($transaksiListByTime as $createdAt => $transaksiList)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                            {{ $transaksiList->first()->status }}
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
                            <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="px-2 rounded-full border-2 border-yellow-500 font-bold text-yellow-500" >!</button>
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
                    
                
        
                @endforeach
            @endforeach
        @else
        <p class=" pt-16 font-bold text-red-500">Belum ada transaksi saat ini!</p>
        @endif





        

    </tbody>
    </table>
    
    
    
    </div>
    </div>

@endsection