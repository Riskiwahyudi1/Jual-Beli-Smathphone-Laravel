@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-12 text-3xl font-bold text-black">Transaksi</p>

    <form action="/admin-transaksi">
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


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Id Transaksi
            </th>
            <th scope="col" class="px-6 py-3">
                Produk
            </th>
            <th scope="col" class="px-6 py-3">
                Total Pembayaran
            </th>
            <th scope="col" class="px-6 py-3">
                Pembeli
            </th>
            <th scope="col" class="px-6 py-3 pl-4">
                Penjual
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal
            </th>
            <th scope="col" class="px-6 py-3 pl-8 ">
                Aksi
            </th>
        </tr>
    </thead>
    @if (count($transaksis) > 0)
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($transaksis as $penjual => $transaksiListByTime)
        @foreach ($transaksiListByTime as $createdAt => $transaksiList)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-4 py-4">
                    {{ $no++ }}
                </td>
                <td class="px-4 py-4">
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
                                        <img class="h-8 w-8 mr-3" src="{{ asset(json_decode($transaksi->produk->foto)[0]) }}" alt="image description">
                                        <div>
                                            <p class="text-xs truncate w-56">{{ $transaksi->produk->nama_produk }}</p><br>
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
                <td class="px-6 py-4 font-semibold">
                    Rp.{{ number_format($transaksiList->first()->total_transaksi, 0, ',', '.') }}
                </td>
                <td class="px-4 py-4">
                    {{ $transaksiList->first()->user->username }}
                </td>
                <td class="px-4 py-4">
                    {{ $penjual }}
                </td>
                <td class="px-4 py-4">
                    {{ $transaksiList->first()->created_at }}
                </td>
                <td class="px-4 py-4">
                    <button data-modal-target="default-modal{{ $transaksiList->first()->id}}" data-modal-toggle="default-modal{{ $transaksiList->first()->id }}" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Detail</button>
                    
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
                                <p class="text-md font-semibold">Nama Toko :</p>
                                <div>
                                    <p class="ms-4 italic">{{ $transaksiList->first()->penjual }}</p>
                                </div>
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
        @endforeach
        @endforeach
       @else
        <tr>
            <td colspan="8" class="text-center text-red-600">
                <p class="font-semibold text-md mt-10">Transaksi "<span class="text-black">{{ request('search') }}</span>" tidak ditemukan!</p>
            </td>
        </tr>
       @endif
    </tbody>
</table>



    </div>
</div>
@endsection