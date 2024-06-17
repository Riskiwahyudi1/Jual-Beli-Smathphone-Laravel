@extends('layouts.main')
@section('container')

<div class="grid gap-2 grid-cols-1 mx-28 border bg-gray-50 rounded-md border-gray-200 lg:grid-cols-2 py-12">
    <div class="w-full mx-10 mt-2">
        <p class="font-bold">Detail Penerima :</p>
        <form action="konfirmasi-checkout" method="post">
            @csrf
            {{-- <div class="grid my-2 md:grid-cols-2"> --}}
                <div >
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Depan</label>
                    <input type="text" name="nama-depan" class="bg-gray-50 border w-11/12 my-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama Lengkap Anda" required />
                </div>
                {{-- <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Belakang</label>
                    <input type="text" name="nama-belakang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama Belakang Anda" required />
                </div> --}}
                
            {{-- </div> --}}
            <div class="mb-2">
                <label for="Alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap</label>
                <textarea name="alamat" rows="4" class="block p-2.5 w-11/12 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Jalan Merdeka No. 123, perumahan merdeka blok A No 05, Kelurahan Kebon Jeruk, Kecamatan Kebon Jeruk" required></textarea>
            </div>
            <div class="mb-2">
                <select  name="expedisi" class="w-1/4 mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Pilih Kurir</option>
                    <option value="JNT Express">JNT Express</option>
                    <option value="JNE Express">JNE Express</option>
                    <option value="Sicepat">Sicepat</option>
                    <option value="Ninja Express">Ninja Express</option>
                    </select>
            </div>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                    <input type="text" name="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Kota" required />
                </div>
                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <input type="text" name="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Provinsi" required />
                </div>
                <div>
                    <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                    <input type="number" name="kode-pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Kode Pos" required />
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                    <input type="tel" name="no-hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="No Hp Anda"  required />
                </div>
                
            </div>

    </div>
    <div class="w-full mx-20 mt-2">
        <p class="font-bold mb-4">Rincian Produk :</p>
        @foreach($products as $product)
        <div class="flex justify-star gap-4 mb-2">
            <img class="h-auto w-14" src="{{ asset('images/imgRiski/'. json_decode($product->foto)[0]) }}" alt="image description">
            <div>
                <p class="font-bold w-96 overflow-hidden text-ellipsis whitespace-nowrap">{{ $product->nama_produk }}</p>
                <p class="font-bold "><small class="text-gray-500 jumlah-produk">{{ $jumlah[$product->id]}} pcs / </small>  <span class="text-blue2">Rp. <span class="checkout-harga-produk">{{  number_format($product->harga - $product->diskon / 100 * $product->harga , 0, ',', '.') }}</span></span></p>
            </div>
                <input type="hidden" name="produk[]" value="{{ $product->id }}">
                <input type="hidden" name="penjual[]" value="{{ $product->user ? $product->user->username : 'Tidak Ada' }}">
                <input type="hidden" name="checkout-jumlah-produk[]" value="{{ $jumlah[$product->id] }}">
                <input type="hidden" name="status[]" value="menunggu-pembayaran"> 
                <input type="hidden" name="ongkir[]" value="30000"> 
            </div>
            <hr class="my-2 mr-28">
            @endforeach
            <small class="text-blue2 hover:cursor-pointer ">Tampilkan Semua...</small>
            <div class="mt-4">
            
                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-6 text-md font-bold tracking-tight text-gray-900 dark:text-white">Ringkasan Pembelian anda :</h5>
                    <div class="flex justify-between">
                        <p class="text-gray-600 ">Subtotal :</p>
                        <p class="text-gray-600 ">Rp.<span class="total-harga"></span></p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-600">Ongkir</p>
                        <p class="text-gray-600">Rp. <span class="ongkir">30.000</span></p>
                    </div>
                    <hr class="my-10 ">
                    <div class="flex justify-between">
                        <p class="font-bold">Total :</p>
                        <p class="font-bold ">Rp.<span class="total-harga-dan-ongkir"></span></p>
                    </div>
                </div>
                
            </div>
            <button type="submit" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4 ">Lanjutkan</button>
        </div>
    </form>    

</div>
<script>
    const jumlah = document.querySelectorAll('.jumlah-produk');
    const harga = document.querySelectorAll('.checkout-harga-produk');
    const totalHarga = document.querySelector('.total-harga');
    const ongkir = document.querySelector('.ongkir');
    const totalHargaOngkir = document.querySelector('.total-harga-dan-ongkir');

    function fixHarga(){
        harga.forEach((e, index) => {
           const jumlahkanHarga = parseInt(e.innerHTML.replace(/\D/g, '')) * parseInt(jumlah[index].innerHTML)
           console.log(jumlahkanHarga)
           e.innerHTML = jumlahkanHarga.toLocaleString('id-ID')
        })
    }
    fixHarga();

    function totalHargaCheckout() {
    let total = 0;
    harga.forEach((e) => {
        total += parseInt(e.innerHTML.replace(/\D/g, '')); 
    });    
    totalHarga.innerHTML = total.toLocaleString('id-ID'); 
}
totalHargaCheckout();


function totalHargaPlusOngkir(){
    const jumlahkan = parseInt(totalHarga.innerHTML.replace(/\D/g, '')) + parseInt(ongkir.innerHTML.replace(/\D/g, ''))
    totalHargaOngkir.innerHTML = jumlahkan.toLocaleString('id-ID')
    console.log(totalHargaOngkir.innerHTML)
}
totalHargaPlusOngkir()

</script>
@endsection
