@extends('layouts.main')
@section('container')
<div class="min-h-screen pb-32 bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        @if(session('message'))
            <script>
                window.onload = function() {
                    alert("{{ session('message') }}");
                }
            </script>
        @endif

        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Ubah Kata Sandi</h2>

        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
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