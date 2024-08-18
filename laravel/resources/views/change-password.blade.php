@extends('layouts.main')
@section('container')
@if(session()->has('message'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('message') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('Current_And_New_Password_Same'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400" role="alert">
        <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('Current_And_New_Password_Same') }}
            </div>
        </div>
    </div>
</div>
@endif
@if (auth()->user()->role == 'buyer')
    <a href="/home" class="font-semibold pt-8 ms-6 mx-2"><i class="fa-solid fa-backward mr-2 text-blue2"></i>Kembali</a>
@else
    <a href="/home-penjual" class="font-semibold pt-8 ms-6 mx-2"><i class="fa-solid fa-backward mr-2 text-blue2"></i>Kembali</a> 
@endif
<div class="min-h-screen pb-32 bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Ubah Kata Sandi</h2>

        <form action="{{ route('passwordChange.update') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="current_password" class="text-gray-600 mb-2">Kata Sandi Saat Ini</label>
                <input type="password" id="current_password" name="current_password" required
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('current_password') border-red-500 @enderror">
                @error('current_password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="new_password" class="text-gray-600 mb-2"> Kata Sandi Baru</label>
                <input type="password" id="new_password" name="new_password" required
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('new_password') border-red-500 @enderror">
                @error('new_password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="new_password_confirmation" class="text-gray-600 mb-2">Konfirmasi Kata Sandi Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-blue2 text-white font-semibold py-2 rounded-lg hover:bg-blue1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Ubah Kata Sandi
            </button>
        </form>
    </div>
</div>
@endsection