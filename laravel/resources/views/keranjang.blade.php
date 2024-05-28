@extends('layouts.main')
@section('container')

<div class="h-[85vh] mx-28 border bg-white rounded-md border-gray-200 flex justify-between">
    <div class="w-full mt-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subtotal
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                       
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                            <img class="h-auto w-10 mr-4 ms-4 " src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="image description">
                            <div>
                                <p class="w-96 overflow-hidden text-ellipsis whitespace-nowrap">samsung galaksi s24 ultra</p>
                                <small class="text-blue2 font-bold">Rp.5.999.000/ pcs</small>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs mr-6">
                                <div class="relative flex items-center">
                                    <button type="button" class="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <p class='counter-produk mx-4'>1</p>
                                    <button type="button" class="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 ">
                            Rp.5.999.000</span>
                        </td>
                        
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                       
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                            <img class="h-auto w-10 mr-4 ms-4 " src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="image description">
                            <div>
                                <p class="w-96 overflow-hidden text-ellipsis whitespace-nowrap">samsung galaksi s24 ultra</p>
                                <small class="text-blue2 font-bold">Rp.5.999.000/ pcs</small>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs mr-6">
                                <div class="relative flex items-center">
                                    <button type="button" class="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <p class='counter-produk mx-4'>1</p>
                                    <button type="button" class="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 ">
                            Rp.5.999.000</span>
                        </td>
                        
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                       
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-start">
                            <img class="h-auto w-10 mr-4 ms-4 " src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="image description">
                            <div>
                                <p class="w-96 overflow-hidden text-ellipsis whitespace-nowrap">samsung galaksi s24 ultra</p>
                                <small class="text-blue2 font-bold">Rp.5.999.000/ pcs</small>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs mr-6">
                                <div class="relative flex items-center">
                                    <button type="button" class="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <p class='counter-produk mx-4'>1</p>
                                    <button type="button" class="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 ">
                            Rp.5.999.000</span>
                        </td>
                        
                    </tr>
                    
              
                    
                    
                   
            </tbody>
        </table>

    </div>
    <div class="w-1/2 mx-20 mt-2">
        <div class="mt-4">
            
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-6 text-md font-bold tracking-tight text-gray-900 dark:text-white"> Pembelian anda :</h5>
                <div class="flex justify-between">
                    <p class="font-bold">Total Pembelian :</p>
                    <p class="font-bold">Rp.<span id="show-total">0</span></p>
                </div>
               
                <hr class="my-10 ">
                {{-- <a href="/checkout" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4 ">Checkout</a> --}}
                <button type="submit" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4 ">Checkout</button>
            </div>
        </form>
        </div>
    </div>
    
</div>
@endsection
