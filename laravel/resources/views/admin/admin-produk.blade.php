@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 text-2xl font-bold text-black">Produk</p>

    <div class="flex justify-center mb-10"> <!-- Flexbox container untuk pusat -->
        <div class="relative w-1/3 flex"> <!-- Kontainer input dan svg -->
            <input type="text" name="name" class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200" placeholder="Cari Produk ...">
            <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100"
                x="10px" y="10px" viewBox="0 0 56.966 56.966"
                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                </path>
            </svg>
            <div class="relative">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 rounded-xl text-xs px-4 py-2 ml-2 dark:focus:ring-blue-900 font-bold" type="button">
                    Status
                    <svg class="ml-6 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton">
                        <li>
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Menunggu Konfirmasi</button>
                        </li>
                        <li>
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Belum di Konfirmasi</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Id Produk</th>
                <th scope="col" class="px-6 py-3">Produk</th>
                <th scope="col" class="px-6 py-3">Harga</th>
                <th scope="col" class="px-6 py-3">Penjual</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $index=>$produk)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="h-8 w-8 mr-3" src="{{ asset(json_decode($produk->foto)[0]) }}" alt="image description">
                    <div class="pl-3">
                        <div class="truncate w-96">{{$produk->nama_produk}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">{{$produk->id}}</td>
                <td class="px-6 py-4">Rp.{{number_format($produk->harga,0,',','.')}}</td>
                <td class="px-6 py-4">{{$produk->user->username}}</td>
                <td class="px-6 py-4">   
                    <button type="button" onclick="confirmDelete()"
                        class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 rounded-full text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-red-900 font-bold">Delete</button>
                    <button type="button"
                        class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 rounded-full text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Confirm</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Hapus Produk</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="deleteProduct()">Hapus</button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="closeModal()">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function deleteProduct() {
            // Logic untuk menghapus produk
            alert('Produk telah dihapus');
            closeModal();
        }

        // Toggle dropdown
        document.getElementById('dropdownButton').addEventListener('click', function() {
            document.getElementById('dropdown').classList.toggle('hidden');
        }); 
    </script>

</div>
@endsection
