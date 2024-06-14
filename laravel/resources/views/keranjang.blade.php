@if(session()->has('success'))
<div class="flex justify-center">
    <div class=" absolute w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
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
@elseif(session()->has('failed'))
<div class="flex justify-center">
    <div class="mt-2 absolute w-1/4 flex items p-4 mb-4 text-sm text-yellow-600 rounded-lg bg-yellow-200 dark:bg-gray-800 dark:text-yellow-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('failed') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main')
@section('container')
@if ($produks->count() == 0)
<div class="h-[85vh] mx-28 border bg-white rounded-md border-gray-200 flex justify-center items-center">
    
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>          
            <div>
                <p class="font-bold text-red-500  mb-4 ms-3">Keranjang Masih Kosong , ayo mulai berbelanja sekarang</p>
                <a href="/home" class="px-4 py-2.5 bg-blue2 rounded-md text-white font-bold ms-3">Belanja Sekarang</a>
            </div>
        </div>
    </div>
</div>
@else
<div class="h-[85vh] mx-28 border bg-white rounded-md border-gray-200 flex justify-between">
    <div class="w-full mt-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subtotal
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <form action="checkout" method="post" id="ubah-action">
                            @csrf
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                            {{-- checkbox untuk checkout produk dari keranjang --}}
                            <input type="checkbox" name="check-produk[]" id="" class="check-produk mt-3 checbox-checkout" value="{{$produk->produk->id }}">
                            {{-- input untuk menghapus produk dari keranjang --}}
                            <input type="hidden" name="check-produk-hapus[]" id="" class=" mt-3 input-hapus" value="{{$produk->id }}">
                            <input type="hidden" name="jumlah[]" value="" class="jml-checkout">
                            <img class="h-auto w-10 mr-4 ms-4 " src="{{ asset('images/imgRiski/'. json_decode($produk->produk->foto)[0]) }}" alt="image description">
                            <div>
                                <p class="w-80 overflow-hidden text-ellipsis whitespace-nowrap">{{ $produk->produk->nama_produk }}</p>
                                @if ($produk->produk->diskon > 0)
                                <small class="text-red-600 font-bold mr-3">Rp.{{ number_format($produk->produk->harga - $produk->produk->diskon / 100 * $produk->produk->harga , 0, ',', '.') }} / pcs</small>
                                <small class="text-blue2 line-through">Rp.{{ number_format($produk->produk->harga, 0, ',', '.') }} / pcs</small>
                                @else
                                <small class="text-blue2">Rp.{{ number_format($produk->produk->harga, 0, ',', '.') }} / pcs</small>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs mr-6">
                                <div class="relative flex items-center">
                                    <button type="button" class="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <p class='counter-produk mx-4'>1</p>
                                    <button type="button" class="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 ">
                            Rp.<span class="hargaPcs">{{ number_format($produk->produk->harga - $produk->produk->diskon / 100 * $produk->produk->harga , 0, ',', '.') }}</span>
                             
                        </td>
                        <td class="px-6 py-4 ">
                            
                        </td>
                        
                    </tr>
                    
                    @endforeach
                    <button type="submit" class=" ms-5 my-2 text-red-600 text-sm font-medium text-center hidden" id="hapus" name="action" value="hapus"><i class="fas fa-trash mr-1"></i>Hapus Produk</button>
                    
                
                
            </tbody>
        </table>
        
    </div>
    <div class="w-1/2 mx-20 mt-2">
        <div class="mt-4">
            
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                
                <h5 class="mb-6 text-md font-bold tracking-tight text-gray-900 dark:text-white"> Pembelian anda :</h5>
                <div class="flex justify-between">
                    <p class="font-bold">Total Pembelian :</p>
                    <p class="font-bold">Rp.<span id="show-total">0</span></p>
                </div>
                
                <hr class="my-10 ">
                <button type="submit" name="action" id="checkout" value="checkout" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4 ">Checkout</button>
            </div>
        </div>
    </form>
    </div>
    @endif
</div>
@endsection
