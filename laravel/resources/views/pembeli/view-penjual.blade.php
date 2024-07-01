@extends('layouts.main')
@section('container')
<div class="bg-blue2 w-full flex flex-col md:flex-row items-center justify-center py-4 gap-4">
    <img src="{{ asset('images/imgRiski/Foto-toko.jpg') }}" class="w-32 h-32 rounded-full" alt="Logo">
    <div class="text-center md:text-left">
        <h3 class="text-black text-2xl font-bold">Teraphone</h3>
        <p class="text-gray-800 md:w-2/4 mx-auto md:mx-0">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque vel debitis omnis aspernatur mollitia beatae ratione dolore soluta corrupti incidunt!
        </p>
        {{-- <div class="gap-2 flex justify-center md:justify-start mt-2">
            <i class="fab fa-instagram text-white"></i>
            <i class="fas fa-envelope text-white"></i>
            <i class="fas fa-phone text-white"></i>
        </div> --}}
        <div class="flex justify-center md:justify-start gap-12 mt-4 font-bold text-black">
            <p>Terjual: 1500</p>
            <p>Rating: <i class="fas fa-star text-yellow-500"></i> 5.0</p>
        </div>
    </div>
</div>
<!-- Navigation Section -->
<div class="flex justify-center md:justify-start py-2 shadow-xl gap-4 bg-white">
    <p class="ms-16 font-bold">Brand</p>
    <p class="font-bold">Populer</p>
    <p class="font-bold">Kategori</p>
</div>
<div class="w-full h-[80vh]">
    
</div>
@endsection