@extends('layouts.main-penjual')
@section('container-penjual')
@if(session()->has('berhasil'))
<div class="flex justify-center">
    

    <div class="absolute z-30 flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <i class="fa-solid fa-circle-info mr-2 mt-1"></i>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('berhasil') }}
            </div>
        </div>
</div>
@endif
<div>

<p class="ms-44 pt-20 text-2xl font-bold text-black">Hubungi Kami</p>

    </div>
    <div class="flex ms-32 mt-12 justify-center gap-28 ">
        <div class="flex justify-center">
            <i class="fas fa-phone text-2xl mr-3 mt-2 text-blue2"></i>
            <div>
                <p class="font-bold">Telepone</p>
                <p>08123456789</p>
            </div>
        </div>
        <div class="flex justify-center">
            <i class="fas fa-envelope text-2xl mr-3 mt-3 text-blue2"></i>
            <div>
                <p class="font-bold">E-mail</p>
                <p>teraphone@gmail.com</p>
            </div>

        </div>
        <div class="flex justify-center">
            <i class="fas fa-map-pin text-2xl mr-3 mt-2 text-blue2"></i>
            <div>
                <p class="font-bold">Lokasi</p>
                <p>Batam, Kepulauan Riau, Indonesia </p>
            </div>
        </div>
        <div class="flex justify-center">
            <i class="fas fa-clock text-2xl  mr-3 mt-2 text-blue2"></i>
            <div>
                <p class="font-bold">Jam Layanan</p>
                <p>08:00 WIB- 17:00 WIB</p>
            </div>
        </div>
    </div>
    <hr class="border-gray-300 border-2 mt-3 mx-16 ms-44">

    <div class="flex justify-center gap-12 my-16 h-[60vh]">
        
            <iframe class="absoute inset-0 ms-44 w-2/4 h-[50vh] border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3180.9131063390634!2d104.0458817!3d1.1187259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sen!2sid!4v1686236640123!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        <div class=" h-2/4 w-2/4">
            <form action="layanan-pengguna-penjual" method="post">
                @csrf
            <input type="text" id="nama" name="nama" class=" w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required />
            <input type="email" id="email" name="email" class=" w-3/4 my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email Anda" required />
            <select id="pengaduan" name="pengaduan" class="w-1/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Pilih Pengaduan</option>
            <option value="Masalah Akun">Masalahan Akun</option>
            <option value="Masalah Pembayaran">Masalah Pembayaran</option>
            <option value="Masalah Produk">Masalah Produk</option>
            <option value="Masalah Sistem">Masalah Sistem</option>
            <option value="Lainnya">Lainnya...</option>
            </select>
            <textarea id="pesan" name="pesan" rows="6" class="block w-3/4 px-0 rounded-lg text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="   Tulis pesan anda disini..." required ></textarea>
            <button type="submit" class="mt-4  text-white ring-2 ring-blue2 bg-blue2 hover:bg-blue1 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center">Kirim Pesan</button>
        </form>
        </div>
    </div>
    @if (count($pesans) > 0)
    <div class="container ms-40 py-8 px-6">
        <h1 class="text-2xl font-bold mb-6">Riwayat Pengaduan</h1>
        <ul class="list-disc pl-5 max-w-full">
            @foreach($pesans as $pesan)
                <li class="mb-4 bg-white p-4 list-none cursor-pointer">
                    <h2 class="text-lg font-bold">{{ $pesan->pengaduan }}
                        @if ($pesan->status == 'Selesai')
                            <span class="bg-green-300 text-green-800 text-xs rounded-md font-semibold me-2 px-2.5 py-0.5">Selesai</span>
                        @endif
                    </h2>
                    <p class="break-words">{{ $pesan->pesan }}</p>
                    <p class="text-sm text-gray-600"><small>Tanggal: {{ $pesan->created_at }}</small></p>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

@endsection