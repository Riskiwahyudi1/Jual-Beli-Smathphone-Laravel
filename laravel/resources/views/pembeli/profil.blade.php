@extends('layouts.main')
@section('container')
    <div class="container px-8 my-8 p-4 bg-gray-200 rounded shadow">
        <div class="flex items-center">
            <div class="w-32 h-32 mr-4">
                <img class="w-full h-full rounded-full object-cover" src="https://via.placeholder.com/150" alt="User Profile Picture">
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $informasiAkun->username }}</h1>
                <a href="#" class="text-blue-600 ">Ubah Foto Profil</a>
            </div>
        </div>
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Akun</h2>
            <div class="grid gap-2">
                <div class="p-4 border-2 border-gray-300 rounded bg-gray-50 ">
                    <p class="font-semibold text-gray-700 ">Nama Lengkap</p>
                    @if ($informasiAkun->name == NULL)
                    <p class="text-red-600 mt-2 italic">Lengkapi Nama Anda!</p>
                    @else
                    <p class="text-gray-600">{{ $informasiAkun->name }}</p>
                    @endif
                </div>
                <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                    <p class="font-semibold text-gray-700">Email</p>
                    <p class="text-gray-600">{{ $informasiAkun->email }}</p>
                </div>
                <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                    <p class="font-semibold text-gray-700">No Hp</p>
                    <p class="text-gray-600">+123 456 7890</p>
                </div>
                <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                    <p class="font-semibold text-gray-700">Alamat Lengkap</p>
                    <p class="text-gray-600">123 Main Street, City, Country</p>
                </div>
            </div>
        </div>
        
        <div class="mt-2 text-left">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="px-4 py-2 bg-blue2 text-white rounded hover:bg-blue1">Edit Profile</button>
        </div>
    </div>
  
  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Edit Profil
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap Anda" required="">
                      </div>
                      <div class="col-span-2">
                          <label for="No Hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Hp</label>
                          <input type="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Hp" required="">
                      </div>
                      
                      <div class="col-span-2 sm:col-span-1">
                          <label for="provinsi"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                          <select  name="provinsi" id="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled selected>Pilih Provinsi</option>
                            @foreach ($provinces['rajaongkir']['results'] as $province)
                                <option value="{{ $province['province'] }}">{{ $province['province'] }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-span-2 sm:col-span-1" id="kota">
                          <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten / Kota</label>
                          <select  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled selected>Pilih Kota/Kab</option>
                            @foreach ($kotaKota['rajaongkir']['results'] as $kota)
                            <option value="{{ $kota['city_name'] }}">{{ $kota['city_name'] }}</option>
                        @endforeach
                          </select>
                      </div>
                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail Alamat</label>
                          <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Perum xxx blok x no xx ...."></textarea>                    
                      </div>
                  </div>
                  <button type="submit" id="simpan-data" class="text-white inline-flex items-center bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      Simpan
                  </button>
              </form>
          </div>
      </div>
  </div> 
  <script>
    const provinsi = document.querySelector('#provinsi')
    const kota = document.querySelector('#kota')

    provinsi.addEventListener('change', () => {
        
        const xhr = new XMLHttpRequest()
        
        xhr.onreadystatechange = () => {
            if(xhr.readyState == 4 && xhr.status == 200){
                kota.innerHTML = xhr.responseText;

            }
        }
        xhr.open('GET', {{ asset('view/pembeli/tes.txt') }}, true)
        xhr.send();
    });
  </script>
  
@endsection