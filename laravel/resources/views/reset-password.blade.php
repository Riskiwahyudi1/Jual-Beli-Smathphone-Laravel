@extends('layouts.main')
@section('container')
<a href="/" class="font-semibold pt-8 ms-6 mx-2"><i class="fa-solid fa-backward mr-2 text-blue2"></i>Kembali</a>
<div class="min-h-screen flex items-center justify-center pb-16">
    <div class="max-w-md w-full bg-white shadow-md rounded px-8 py-6">
        <h2 class="text-center text-2xl font-bold mb-6">Reset Password</h2>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input type="email" name="email" id="email" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full @error('email') border-red-500 @enderror" autofocus value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" name="password" id="password" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full">
            </div>

            <button type="submit" class="w-full bg-blue2 text-white py-2 px-4 rounded hover:bg-blue1">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
