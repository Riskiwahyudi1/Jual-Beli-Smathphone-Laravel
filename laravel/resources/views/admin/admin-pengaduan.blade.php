@if(session()->has('success'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid mr-3 mt-1 fa-circle-exclamation"></i>
        {{-- <span class="sr-only">Info</span> --}}
        <div>
            <span class="font-medium">{{ session('success') }}
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">
    
    <p class="ms-6 mt-12 mb-4 text-4xl font-bold text-black">Pesan</p>


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Kategori User
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Pengaduan
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesans as $index=>$pesan)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                {{$index+1}}
            </td>
            <td class="px-6 py-4">
                {{$pesan->nama}}
            </td>
            <td class="px-6 py-4">
                {{$pesan->user->role}}
            </td>
            <td class="px-6 py-4">
                {{$pesan->pengaduan}}
            </td>
            <td class="px-6 py-4">
                {{$pesan->status}}
            </td>
            <td class="px-6 py-4"> 
            <button data-modal-target="selesai-modal{{ $pesan->id }}" data-modal-toggle="selesai-modal{{ $pesan->id }}" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Selesai</button>  
            <button data-modal-target="default-modal{{ $pesan->id }}" data-modal-toggle="default-modal{{ $pesan->id }}" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-2 py-1 me-2 mb-2 dark:focus:ring-blue-900 font-bold">Detail</button>
            </td>
        </tr>
         {{-- modal verifikasi produk --}}
         <div id="selesai-modal{{ $pesan->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah permasalahan user selesai?</h3>
                        <form action="admin-pengaduan" method="post">
                            @csrf
                            
                            <input type="hidden" name="pesan-id[]" value="{{ $pesan->id }} ">
                            <button data-modal-hide="verifikasi-modal" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, Selesai
                            </button>
                        </form>
                        <button data-modal-hide="selesai-modal{{ $pesan->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Belum, Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main modal -->
        <div id="default-modal{{ $pesan->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail Pengaduan 
                        </h3>
                        
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:py-2 space-y-1">
                        <p class="text-md font-semibold flex justify-end italic">Tanggal Pengaduan:  <span class="text-blue2"> {{ $pesan->created_at->format('d/m/Y H:i') }}</span></p>
                    <div>
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            <span class="font-bold text-gray-900 dark:text-white">Id Pengaduan:</span>
                            <span class="text-gray-700 dark:text-gray-400">{{$pesan->id}}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 dark:text-white">Nama:</span>
                            <span class="text-gray-700 dark:text-gray-400">{{$pesan->nama}}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 dark:text-white">Role:</span>
                            <span class="text-gray-700 dark:text-gray-400">{{$pesan->user->role}}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 dark:text-white">Email:</span>
                            <span class="text-gray-700 dark:text-gray-400">{{$pesan->email}}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 dark:text-white">Pengaduan:</span>
                            <span class="text-gray-700 dark:text-gray-400">{{$pesan->pengaduan}}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 dark:text-white">Status:</span>
                            <span class="text-gray-700 dark:text-gray-400">{{$pesan->status}}</span>
                        </div>
                        <hr class="bg-gray-600 border-2">
                        <div>
                            <p class="font-bold text-lg text-gray-900 dark:text-white">Isi Pesan:</p>
                            <p class="text-gray-700 dark:text-gray-400 ms-4">{{$pesan->pesan}}</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="default-modal{{ $pesan->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center absolute right-5 bottom-4">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
       
  
        @endforeach
    </tbody>
</table>



    </div>
</div>
<div class=" my-5 inset-x-0  flex justify-center">
    {{ $pesans->links() }}
</div>
@endsection