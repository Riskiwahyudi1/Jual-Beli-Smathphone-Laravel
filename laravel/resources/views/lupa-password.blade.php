@extends('layouts.main')

@section('container')
<a href="/" class="font-semibold pt-8 ms-6 mx-2"><i class="fa-solid fa-backward mr-2 text-blue2"></i>Kembali</a>
<div class="min-h-screen flex items-center justify-center pb-16">
    <div class="max-w-md w-full bg-white shadow-md rounded px-8 py-6">
        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <h2 class="text-center text-2xl font-bold mb-6">Lupa Password</h2>

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input type="email" name="email" id="email" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full @error('email') border-red-500 @enderror" autofocus>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue2 text-white py-2 px-4 rounded hover:bg-blue1">
                Kirim Tautan Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
