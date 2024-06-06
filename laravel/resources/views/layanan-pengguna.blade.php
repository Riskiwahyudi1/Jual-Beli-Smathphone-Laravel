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

<div class="flex justify-between">
    <div class="container mx-auto my-8">
            <div class="relative w-full h-96">
                <iframe
                    class="absolute inset-0 w-2/4 h-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3180.9131063390634!2d104.0458817!3d1.1187259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sen!2sid!4v1686236640123!5m2!1sen!2sid"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </>
    </div>
    <div class="container mx-9 my-5">
        <h1>TINGGALKAN PESAN</h1>
    </div>
</div>
@endsection
