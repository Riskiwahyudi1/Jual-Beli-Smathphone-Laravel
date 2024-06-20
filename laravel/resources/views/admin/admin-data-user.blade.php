@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-12 text-3xl font-bold text-black">User</p>

    <div class="flex justify-center mb-10"> <!-- Flexbox container untuk pusat -->
        <div>

            <form class="max-w-sm mx-auto">

                <select id="countries"
                    class="bg-blue2 border border-blue2 text-white text-sm rounded-lg focus:ring-blue2 focus:border-blue2 block w-full p-2.5 dark:bg-blue2 dark:border-blue2 dark:placeholder-blue2 dark:text-white dark:focus:ring-blue2 dark:focus:border-blue2 ">
                    <option selected>Semua</option>
                    <option value="US">Penjual</option>
                    <option value="CA">Pembeli</option>
                </select>
            </form>


        </div>
        <div class="relative w-1/3 ms-10"> <!-- Kontainer input dan svg -->
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



    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori User
                </th>
                <th scope="col" class="px-6 py-3">
                    No Hp
                </th>
                <th scope="col" class="px-6 py-3">
                    Bergabung
                </th>
                <th scope="col" class="px-24 py-3">
                    Aksi
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    Teraphone
                </td>
                <td class="px-6 py-4">
                    Teraphone@gmail.com
                </td>
                <td class="px-6 py-4">
                    Penjual
                </td>
                <td class="px-6 py-4">
                    081258926995
                </td>
                <td class="px-6 py-4">
                    17-07-2024
                </td>
                <td class="px-16 py-4">
                    <button>
                        <i class="text-yellow-500 ms-4 fas fa-pen fa-2x"
                            style="color: blue; margin-right: 10px;"></i>
                    </button>
                    <button>
                        <i class="fas fa-ban fa-2x text-red-600"></i>
                    </button>
                    <button  class="px-2 rounded-full border-2 border-yellow-500 font-bold text-yellow-500 text-2xl" >!</button>


                </td>
            </tr>
        </tbody>
    </table>



</div>
</div>
@endsection