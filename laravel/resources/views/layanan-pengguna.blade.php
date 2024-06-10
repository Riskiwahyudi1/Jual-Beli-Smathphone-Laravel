@extends('layouts.main')
@section('container')

<div class="flex justify-center gap-28">

    <div class="flex justify-center">
        <i class="fas fa-phone text-2xl mr-3 mt-2 text-blue2"></i>
        <div>
            <p>Telepone</p>
            <p>081234567</p>
        </div>
    </div>
    <div class="flex justify-center">
        <i class="fas fa-envelope text-2xl mr-3 mt-3 text-blue2"></i>
        <div>
            <p>E-mail</p>
            <p>@achillsetara16@gmail.com</p>
        </div>

    </div>
    <div class="flex justify-center">
        <i class="fas fa-map-pin text-2xl mr-3 mt-2 text-blue2"></i>
        <div>
            <p>Lokasi</p>
            <p>Batam, Kepulauan Riau </p>
        </div>
    </div>
    <div class="flex justify-center">
        <i class="fas fa-clock text-2xl  mr-3 mt-2 text-blue2"></i>
        <div>
            <p>Jam</p>
            <p>09:00</p>
        </div>
    </div>
</div>

<div class="flex justify-center gap-12 my-16 h[100vh]">
    
        <iframe class="absoute inset-0 h-2/4 w-2/4 border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3180.9131063390634!2d104.0458817!3d1.1187259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sen!2sid!4v1686236640123!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
    <div class=" h-2/4 w-2/4">
        <input type="text" id="name" class="w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required />
        <input type="text" id="name" class="w-3/4 my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email Anda" required />
        <textarea id="editor" rows="8" class="block w-3/4 px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write an article..." required ></textarea>
    </div>
</div>




















        <!-- <div class="flex justify-star bg-blue-500"> -->
            <!-- <div class="container mx-auto my-8"> -->
                <!--  -->
            <!-- </div> -->
            <!-- <div class="">
                <div>
                    <h1>TINGGALKAN PESAN</h1>
                </div>
                <input type="text" id="nama" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Nama Kamu" required >
                
             </div>
        </div> -->
<!-- 

    <div>
    </div>
    <div>
        <input type="text" id="location-search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="E-mail Kamu" required >
    </div>
    <div>
        <input type="text" id="location-search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Tulis pesan anda disini..." required >
    </div>
    <div>
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim Pesan</button>
    </div>
</div> -->

@endsection