@extends('layouts.main')
@section('container')
<nav class="bg-gray-100 rounded-lg dark:bg-gray-700 top-20 left-0 right-0 w-5/6 z-30 mx-auto fixed">
    <div class="px-4 py-3">
        <div class="flex items-center justify-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                @foreach ($status as $s)
                <li>
                    <div class="{{ $active === $s ? 'border-blue2 border-b-4 px-1 ' : '' }}">
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
                        <a href="/riwayat-transaksi/{{ $s }}" class="text-gray-500  dark:text-white hover:text-gray-700 ms-1" aria-current="page">{{ ucwords(str_replace('-', ' ', $s)) }}
                        </a>
                    </div>
                </li>                
                @endforeach
            </ul>          
        </div>
    </div>
</nav>
<div class="overflow-x-auto w-3/4 mx-auto mt-20">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Penjual
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                        <img class="h-auto w-10 mr-4" src="{{ asset('images/imgRiski/oppo5.jpeg') }}" alt="image description">
                        <div>
                            <p>Iphone 17</p>
                            <small class="text-gray-500">1 Pcs</small>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        Rp.16.000.000
                    </td>
                    <td class="px-6 py-4">
                        Teraphone
                    </td>
                    <td class="px-6 py-4">
                        14/5/2024 17:45
                    </td>
                    <td class="flex justify-center px-6 py-4 gap-2">
                        <button  class="px-2 py-2 bg-blue2 rounded-md text-white">Upload bukti Pembayaran</button>
                        <button  class="px-2 py-2 bg-red-500 rounded-md text-white">Batalkan</button>
                        <button  class="px-2 py-2 bg-yellow-400 rounded-md text-white">Detail</button>
                    </td>
                </tr>
            
        </tbody>
    </table>
</div>

@endsection



{{-- @elseif($transaksi->status === 'Dikemas')
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                        <img class="h-auto w-10 mr-4" src="{{ asset('images/imgRiski/gambar 1.jpeg') }}" alt="image description">
                        <div>
                            <p>{{ $transaksi->produk->nama_produk }}</p>
                            <small class="text-gray-500">1 Pcs</small>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        Rp.{{ number_format($transaksi->produk->harga, 0, ',', '.')}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaksi->penjual }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaksi->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Yellow</button>
                    </td>
                </tr> --}}