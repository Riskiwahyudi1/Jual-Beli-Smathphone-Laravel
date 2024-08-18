
@extends('layouts.main')
<div class="w-full max-w-sm p-4 mx-auto mt-[10vh] bg-white border border-gray-200 rounded-xl shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    
    <form class="space-y-6" action="/admin-login" method="post">
        @csrf

        {{-- jika berhasil registrasi --}}
        @if(session()->has('berhasil'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
      <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">{{ session('berhasil') }}
        </div>
      </div>
    @endif
      {{-- jika gagal login --}}
        @if(session()->has('LoginError'))
    <div class="flex items-center p-4 mb-4 text-sm text-red-700 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-green-400" role="alert">
      <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">{{ session('LoginError') }}
        </div>
      </div>
    @endif
    {{-- jika ada error yang lainnya --}}
    @if ($errors->any())
        <div class="flex items-center p-4 mb-4 text-sm text-red-700 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-green-400" role="alert">
          <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
          <span class="sr-only">Info</span>
          <div>
            @foreach ($errors->all() as $error)
            <span class="font-medium">{{ $error }}
            @endforeach
          </div>
        </div>

    @endif
    <div class="flex justify-center rtl:space-x-reverse">
      <img src="{{ asset('images/imgRiski/terafon.png') }}" class="h-12 rounded-full " alt="Flowbite Logo" />
    </div>
    <div class="flex justify-center">
        <a href="/login" class="text-xl text-blue1 dark:text-white font-bold">Login Admin</a>
    </div>
        {{-- form input --}}
        <div>
          <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email" value="{{ old('email') }}" required />
        </div>
        <div>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex items-end">
           
            <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lupa Password?</a>
        </div>
        <button type="submit" class="w-full text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        
    </form>
</div>
