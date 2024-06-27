
@extends('layouts.main')
<div class="w-full max-w-sm p-4 mx-auto mt-[10vh] bg-white border border-gray-200 rounded-xl shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="/register-penjual" method="post">
        @csrf
        <div class="flex justify-between">
            <a href="/login-user" class="text-xl font-medium text-gray-400 dark:text-white ms-12">Login</a>
            <a href="/register-pembeli" class="text-xl font-medium text-blue1 dark:text-white mr-12">Register</a>
        </div>
        <div class="flex justify-center space-x-1 rtl:space-x-reverse">
            <img src="{{ asset('images/imgRiski/terafon.png') }}" class="h-10 rounded-full " alt="Flowbite Logo" />
        </div>
        <div>
            <input type="text" name="username" id="username" value="{{ old('username') }}" class="bg-gray-50 {{ $errors->has('username') ? 'border-red' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  dark:placeholder-gray-400 dark:text-white" placeholder="username"  />
            @error('username')
            <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 {{ $errors->has('email') ? 'border-red' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  dark:placeholder-gray-400 dark:text-white" placeholder="Email"  />
            @error('email')
            <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password" class="bg-gray-50 {{ $errors->has('password') ? 'border-red' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:placeholder-gray-400 dark:text-white"  />
            @error('password')
            <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div>
            <input type="password" name="confirmasi-password" id="password" placeholder="Konfirmasi Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            @error('confirmasi-password')
                <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-end">
           
        </div>
        <button type="submit" class="w-full text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            <a href="/register-pembeli" class="text-blue-700 hover:underline dark:text-blue-500">Register Pembeli?</a>
        </div>
    </form>
</div>
