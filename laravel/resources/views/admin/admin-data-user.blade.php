@extends('layouts.main-admin')
@section('container-penjual')
<div class="pt-10 ps-40">

    <p class="ms-6 mt-12 text-3xl font-bold text-black">User</p>
    
    <form action="/admin-data-user">
        @csrf
    <div class="flex justify-center mb-10 mt-10"> 
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button"><span id="title-role">Role User</span><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="/admin-data-user" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white font-bold">Semua</a> 
                    </li>                       
                    <li>
                        <a href="/admin-data-user?role=buyer" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white font-bold">Buyer</a> 
                    </li>                       
                    <li>
                        <a href="/admin-data-user?role=seller" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white font-bold">Seller</a> 
                    </li>                       
                </ul>
            </div>
        <div class="relative w-1/3 ms-4">
            @if (request('role'))
            <input id="role-user" type="hidden" name="status" value="{{ request('role') }}"> 
            @endif 
            <input type="text" name="search"
                class="w-full border h-10 shadow p-4 rounded-xl dark:text-gray-600 dark:border-gray-400 dark:bg-gray-200"
                placeholder="Cari User ..." value="{{ request('search') }}">
            <svg class="text-gray-600 h-5 w-5 absolute top-2 right-2 fill-current dark:text-gray-100" x="10px" y="10px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                </path>
            </svg>
        </div>
    </div>
</form>


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-3 pl-16">
                    No
                </th>
                <th scope="col" class="px-3 py-3 pl-16">
                    Username
                </th>
                <th scope="col" class="px-3 py-3 pl-16">
                    Email
                </th> 
                <th scope="col" class="px-3 py-3 pl-16">
                    Kategori User
                </th>
                <th scope="col" class="px-3 py-3 pl-16">
                    No Hp
                </th>
                <th scope="col" class="px-3 py-3 pl-16">
                    Bergabung
                </th>
                {{-- <th scope="col" class="px-3 py-3 pl-16">
                    Aksi
                </th> --}}

            </tr>
        </thead>
        <tbody>
            @if (request()->has('search') && $users->isEmpty())
                <tr>
                    <td colspan="7" class="text-center py-4 text-red-600 font-bold">
                        User tidak ditemukan.
                    </td>
                </tr>
            @else
                @foreach ($users as $index => $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-3 py-4 pl-16">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-3 py-4 pl-16">
                            {{ $user->username }}
                        </td>
                        <td class="px-3 py-4 pl-16">
                            {{ $user->email }}
                        </td>
                        <td class="px-3 py-4 pl-16">
                            {{ $user->role }}
                        </td>
                        <td class="px-3 py-4 pl-16">
                            081258926995
                        </td>
                        <td class="px-3 py-4 pl-16">
                            {{ $user->created_at }}
                        </td>
                        {{-- <td class="px-16 py-4 pl-16">
                            <button><i class="fas fa-ban text-16 text-red-600"></i></button>
                            <button><i class="fa-solid mr-3 text-yellow-500 fa-circle-exclamation px-2"></i></button>
                        </td> --}}
                    </tr>
                @endforeach
        
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            Tidak ada user yang ditemukan.
                        </td>
                    </tr>
                @endif
            @endif
        </tbody>
        
    </table>
</div>
</div>
<div class=" my-5 inset-x-0  flex justify-center">
    {{ $users->links() }}
</div>
@endsection