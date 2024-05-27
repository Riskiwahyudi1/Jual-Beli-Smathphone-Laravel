@extends('layouts.main-penjual')
@section('container-penjual')
<div class="pt-20 ps-40">
    <p class="ms-6 text-2xl font-bold text-black">Dashboard </p>
    <div class="flex justify-around mt-6 mx-12">
        <div class=" px-12 py-8 bg-gray-300 rounded-md flex justify-center items-center">
            <div class="flex justify-center items-center gap-2">
                <i class="fas fa-list text-5xl text-red"></i>
                <div>
                    <p class="text-xl font-bold">Total Order</p>
                    <p class="text-3xl ms-6 font-bold">100</p>
                </div>
            </div>
        </div>
        <div class=" px-12 py-8 bg-gray-300 rounded-md flex justify-center items-center">
            <div class="flex justify-center items-center gap-2">
                <i class="fas fa-list text-5xl text-red"></i>
                <div>
                    <p class="text-xl font-bold">Menunggu</p>
                    <p class="text-3xl ms-6 font-bold">100</p>
                </div>
            </div>
        </div>
        <div class=" px-12 py-8 bg-gray-300 rounded-md flex justify-center items-center">
            <div class="flex justify-center items-center gap-2">
                <i class="fas fa-list text-5xl text-red"></i>
                <div>
                    <p class="text-xl font-bold">Dikirim</p>
                    <p class="text-3xl ms-6 font-bold">100</p>
                </div>
            </div>
        </div>
        <div class=" px-12 py-8 bg-gray-300 rounded-md flex justify-center items-center">
            <div class="flex justify-center items-center gap-2">
                <i class="fas fa-list text-5xl text-red"></i>
                <div>
                    <p class="text-xl font-bold">Selesai</p>
                    <p class="text-3xl ms-6 font-bold">100</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection