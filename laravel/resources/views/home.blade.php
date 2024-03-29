<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lapstore | List Barang</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <nav class="bg-blue border-gray-200 dark:bg-gray-900">
        <div class="flex justify-between items-center mx-auto max-w-screen-2xl p-4 ms-5">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">TeraPhone</span>
            </a>
            <div class=" w-1/3">
                <form class="max-w-md mx-auto">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <input type="text" id="default-search" class="block w-full max-w-none a z-20  p-4 ps-10 text-sm text-white border border-gray-300 rounded-lg bg-blue2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " style="height: 40px;" placeholder="Cari Produk ..." required />
                        <button type="submit" style="height: 25px;" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg></button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center">
                <a href="#" class="px-5 text-white font-extrabold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>                    
                </a>
                <a href="#" class="px-5 text-white ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>                     
                </a>
                <a href="#" class="px-5 flex justify-center mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>  
                    <p class="text-white">Akun Saya</p>                    
                </a>
            </div>
        </div>
    </nav> 
    <nav class="bg-gray-50 dark:bg-gray-700 shadow-lg">
        <div class="max-w-screen-2xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Brand</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">flagsip</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Gaming</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Camera Quality</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Mid Range</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 dark:text-white hover:underline">Low Range</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
</body>
</html>
