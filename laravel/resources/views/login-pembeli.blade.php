
@extends('layouts.main')
<div class="w-full max-w-sm p-4 mx-auto mt-[10vh] bg-white border border-gray-200 rounded-xl shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        <div class="flex justify-between">
            <a href="/login" class="text-xl font-medium text-blue1 dark:text-white ms-12">Login</a>
            <a href="/register-pembeli" class="text-xl font-medium text-gray-400 dark:text-white mr-12">Register</a>
        </div>
        <div class="flex justify-center space-x-1 rtl:space-x-reverse">
            <img src="{{ asset('images/imgRiski/Logo.png') }}" class="h-10 rounded-full " alt="Flowbite Logo" />
            <p class=" text-2xl mt-2 font-semibold text-gray-700">eraPhone</p>
        </div>
        {{-- form input --}}
        <div>
          <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email" value="{{ old('email') }}" required />
        </div>
        <div>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex items-end">
           
            <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lupa Password?</a>
        </div>
        <button type="submit" class="w-full text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Login Penjual?</a>
        </div>
</div>
