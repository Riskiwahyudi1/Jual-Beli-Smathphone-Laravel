@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-12 text-3xl font-bold text-black">Produk</p>

    <div class="flex justify-center mb-10"> <!-- Flexbox container untuk pusat -->
        <div>

            <div class=""style="margin-right: 64px">
            <select id="countries"
                    class="bg-blue2 border border-blue2 text-white text-sm rounded-lg focus:ring-blue2 focus:border-blue2 block w-full p-2.5 dark:bg-blue2 dark:border-blue2 dark:placeholder-blue2 dark:text-white dark:focus:ring-blue2 dark:focus:border-blue2 ">
                    <option selected>Konfirmasi</option>
                    <option value="US">Menunggu Verifikasi</option>
                    <option value="CA">Terverifikasi</option>
                </select>
            </div>

        </div>
        <div class="relative w-1/3 ms-10"> 
            <input type="text" name="name"
                class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200"
                placeholder="Cari Produk ...">
            <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100" x="10px" y="10px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                </path>
            </svg>
        </div>
    </div>
    {{-- <div><p class="ms-6 mt-12 text-xl font-bold text-black">Menunggu Konfirmasi</p></div> --}}



    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="">
                Id Produk
            </th>
            <th scope="col" class="px-6 py-3">
                Produk
            </th>
            <th scope="col" class="px-6 py-3">
                 Harga
            </th>
            <th scope="col" class="px-6 py-3">
            Status
            </th>
            <th scope="col" class="px-6 py-3">
                Jumlah
            </th>
            <th scope="col" class="px-6 py-3">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $index => $produk)
            
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                {{ $index + 1 }}
            </td>
            <td class="px-6 py-4">
                {{ $produk->id }}
            </td>
            <td class="px-6 py-4">
                {{ $produk->nama_produk }}
            </td>
                
            <td class="px-6 py-4">
                Rp. {{ $produk->harga }}
            </td>
            <td class="px-6 py-4">
                Terverifikasi
            </td>
            <td class="px-6 py-4">
                {{ $produk->stok }}
            </td>
            
            <td class="px-2 py-4 flex items-center justify-center">
    <i class="text-yellow-500 fas fa-pen" style="color: blue; margin-right: 10px;"></i>
    <i class="fas fa-trash" style="color: red; margin-right: 10px;"></i>
    <button type="button"
    class="px-2 rounded-full border-2 border-yellow-500 font-bold text-yellow-500">!</button>
</button>

</td>

        </tr>
        @endforeach

    </tbody>
    </table>
</div>
@endsection
