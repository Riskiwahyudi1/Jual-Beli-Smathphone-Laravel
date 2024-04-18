@extends('layouts.main')
@section('container')
<p class="font-semibold mt-4 ms-6 mx-2">Home <small><i class="fas fa-play text-gray-500"></i></small> <span class="text-blue2 mt-4">Detail Produk</span></p>
<div class="grid grid-cols-1 gap-10 mt-6  p-4 bg-white rounded-lg  xl:grid-cols-2 xl:mx-32">
    <div class="grid gap-4 ">
        <div>
            <img class="w-[600px] h-96 rounded-lg " id="imgZoom" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
        </div>
        <div class="grid grid-cols-5 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg imgSmall cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg imgSmall cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg imgSmall cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg imgSmall cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg imgSmall cursor-pointer" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="">
        <h1 class="font-bold text-lg ">handphone samsung S20</h1>
        <div class="flex justify-star mb-10 mt-2">
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
            <i class="fas fa-star" style="color: #FFD43B;"></i>
        </div>
        <p class="text-lg font-bold text-blue1 mb-6">Rp.20.399.000</p>
        <div>
            <button type="button" class="w-5 h-5 rounded-full bg-red" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-5 h-5 rounded-full bg-blue2" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-5 h-5 rounded-full bg-yellow-300" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-5 h-5 rounded-full bg-black" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-5 h-5 rounded-full bg-gray-600" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        </div>
        <div class="flex-col mt-4 xl:justify-star">
            <div class="max-w-xs mr-6">
                <div class="relative flex items-center">
                    <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="text" id="counter-input" data-input-counter class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="1" required />
                    <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4 ">Tambahkan Ke Keranjang</button>
            <button type="submit" class="text-white bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button>
            
        </div>
        <small class="font-bold ">Kategori : <span class="text-gray-400"> Low Range</span></small><br>
        <small class="font-bold">Brand : <span class="text-gray-400"> Asus</span></small>
        <hr class="h-px mt-3  bg-gray-300 border-0 dark:bg-gray-700 ">

        <div class="flex justify-star">
            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-12 rounded-full h-12 mt-6">
            <div>
                <p class="mt-6 ms-4 text-lg font-bold">Teraphone</p>
                <div class="flex justify-star">
                    <small class="font-bold ms-4 text-blue2">Produk : <span class="text-gray-500 font-semibold"> 456</span></small>
                    <small class="font-bold ms-4 text-blue2">Penjualan : <span class="text-gray-500 font-semibold"> 1562</span></small>
                    <small class="font-bold ms-4 text-blue2">Penilaian : <span class="text-gray-500 font-semibold"> 4.9</span></small>
                </div>
            </div>
        </div>
        <button type="submit" class="mt-4  text-blue2 ring-2 ring-blue2 hover:bg-gray-100 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center">Kunjungi Toko</button>
    </div>
</div>
<div class="flex justify-star mt-6 mb-6 ms-32">
    <h1 class="text-xl font-bold border-b-4 px-1 rounded-sm border-blue2">SPESIFIKASI</h1>
</div> 
<div class="grid grid-cols-2 gap-5 ms-32 lg:grid-cols-3">
    <small class="font-bold">Prosesor : <span class="text-gray-400"> Helio G85 Gaming Proseso</span></small>
    <small class="font-bold">RAM/ROM : <span class="text-gray-400"> 6GB+6GB RAM*/128GB ROM</span></small>
    <small class="font-bold">Baterai : <span class="text-gray-400"> 5000mAh</span></small>
    <small class="font-bold">Dimensi : <span class="text-gray-400"> 164,30x76,10x8,38mm</span></small>
    <small class="font-bold">Berat : <span class="text-gray-400"> 190g</span></small>
    <small class="font-bold">Pengisi Daya : <span class="text-gray-400"> 18W Fast Charge</span></small>
    <small class="font-bold">Resolusi : <span class="text-gray-400">  1612x720(HD+)</span></small>
    <small class="font-bold">Layar : <span class="text-gray-400"> : 6,55 inch</span></small>
    <small class="font-bold">Tipe Layar : <span class="text-gray-400"> LCD</span></small>
</div>
<hr class="h-px my-4 mx-32 bg-gray-300 border-0 dark:bg-gray-700 ">
<div class="flex justify-star mt-6 mb-6 ms-32">
    <h1 class="text-xl font-bold border-b-4 px-1 rounded-sm border-blue2">DESKRIPSI </h1>
</div> 
<div class="ms-32">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident dolorem perferendis modi fugiat corrupti, numquam sit, repellendus dicta eos temporibus similique minima qui iusto maxime. Necessitatibus molestiae nemo vel quis adipisci tempore quia qui facere, quidem illum esse dicta atque excepturi voluptatem iusto sed consequuntur eaque error hic dolorem consequatur?</p>
</div>
<hr class="h-px my-6 mx-32 bg-gray-300 border-0 dark:bg-gray-700 ">
<div class="flex justify-star mt-6 mb-6 ms-32">
    <h1 class="text-xl font-bold border-b-4 px-1 rounded-sm border-blue2">PENILAIAN </h1>
</div> 
<div class="ms-4">
    <div class="flex justify-star mx-32">
        <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-8 rounded-full h-8 ">
        <p class=" ms-4 text-sm font-bold">S.F Trialaka <span class="text-gray-500 font-normal">16-04-2024 </span></p>
    </div>
    <div class="flex justify-star mb-4 mx-44">
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
        <i class="fas fa-star" style="color: #FFD43B;"></i>
    </div>
    <div class="flex justify-star mx-32 gap-3">
        <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-12  h-12 ms-12">
        <img src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="" class="w-12  h-12">
    </div>
        <p class="font-normal mx-44 my-4 w-1/4">Barang sangat bagus dan pengiriman cepat, respon penjual sangat sangat baik , sudah saya kasih bintang 5</p><br>
</div>
<footer class="bg-black  h-64 text-white py-8">
    <div class="flex justify-between">
        <div class="ms-28">
            <h1 class="text-3xl font-bold">TeraPhone</h1>
            <div class="flex justify-star gap-3 mt-4">
                <p>
                    <i class="fas fa-envelope text-blue2"></i>
                </p>
                <p>teraphone@gmail.com</p>
            </div>
            <div class="flex justify-star gap-3 mt-1">
                <p>
                    <i class="fas fa-phone text-blue2"></i>
                </p>
                <p>081234567891</p>
            </div>
            <div class="flex justify-star gap-3 mt-1">
                <p>
                    <i class="fas fa-map-pin text-blue2"></i>
                </p>
                <p>Batam, Kepulauan Riau, Indonesia</p>
            </div>
        </div>
        <div class="mr-28">
            <h1 class="text-lg font-bold">Tautan</h1>
            <div class="mt-4">
                <a href="#">Tentang Kami</a>
            </div>
            <div class="mt-1">
                <a href="#">Pembayaran</a>
            </div>
            <div class="mt-1">
                <a href="#">Pengiriman</a>
            </div>
            <div class="mt-1">
                <a href="#">Service</a>
            </div>
        </div>
        <div class="mr-28">
            <h1 class="text-lg font-bold">Sosial Media</h1>
            <div class="flex justify-star gap-3 mt-4">
                <p>
                    <i class="fab fa-instagram text-pink-700"></i>
                </p>
                <p>TeraPhone.id</p>
            </div>
            <div class="flex justify-star gap-3 mt-1">
                <p>
                    <i class="fab fa-facebook text-blue-500"></i>
                </p>
                <p>TeraPhone.id</p>
            </div>
            <div class="flex justify-star gap-3 mt-1">
                <p>
                    <i class="fab fa-youtube text-red"></i>
                </p>
                <p>TeraPhone</p>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-5">
        <small>&commat;&nbsp;2024 TeraPhone, All Right Reserved</small>
    </div>
</footer>
<script>
    const imgZoom = document.getElementById('imgZoom');
    const imgsmall = document.querySelectorAll('.imgSmall');
    
    imgsmall.forEach((img) => {
        img.addEventListener('click', function() {
            imgZoom.src = img.src;
            imgsmall.forEach((img) => {
                if (img === this) {
                    img.style.opacity = 0.5;
                    img.style.boxShadow = "0 0 10px rgba(0, 0, 0, 1)";
                } else {
                    img.style.opacity = 1;
                    img.style.boxShadow = "none";
                }
            });
        });
    });
</script>


@endsection