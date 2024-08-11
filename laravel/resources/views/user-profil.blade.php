@if(session()->has('success-edit-profil'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success-edit-profil') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('success-tambah-rekening'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success-tambah-rekening') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('success-edit-rekening'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success-edit-rekening') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('success-delete-rekening'))
<div class="flex justify-center ">
    <div class=" absolute z-30 w-1/4  flex items mt-2 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success-delete-rekening') }}
            </div>
        </div>
    </div>
</div>
@elseif(session()->has('error'))
<div class="flex justify-center ">
    <div class=" absolute w-1/4 z-30 flex items mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('error') }}
            </div>
        </div>
    </div>
</div>
@endif
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
                    <p class="font-semibold text-gray-700 ">Nama Lengkap:</p>
                    @if ($informasiAkun->name == NULL)
                    <p class="text-red-600 mt-2 italic">Lengkapi Nama Anda!</p>
                    @else
                    <p class="text-gray-600">{{ $informasiAkun->name }}</p>
                    @endif
                </div>
                <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                    <p class="font-semibold text-gray-700">Email:</p>
                    <p class="text-gray-600">{{ $informasiAkun->email }}</p>
                </div>
                <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                    <p class="font-semibold text-gray-700">No Hp :</p>
                    @if ($informasiAkun->no_hp == NULL)
                    <p class="text-red-600 mt-2 italic">Lengkapi No HP Anda!</p>
                    @else
                    <p class="text-gray-600">{{ $informasiAkun->no_hp }}</p>
                    @endif
                </div>
                <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                    <p class="font-semibold text-gray-700">Alamat Lengkap:</p>
                    @if ($informasiAkun->alamat == NULL)
                    <p class="text-red-600 mt-2 italic">Lengkapi Alamat Anda!</p>
                    @else
                    <p class="text-gray-600">{{ $detailAlamat['detail_alamat']. ', Kota ' . $detailAlamat['kota']. ', ' . $detailAlamat['provinsi']. ', ' . $detailAlamat['kode_pos']}}</p>
                    @endif
                </div>
            </div>
            <div class="mt-2 text-left flex gap-3">
                <button data-modal-target="edit-profil" data-modal-toggle="edit-profil" class="px-4 py-2 bg-blue2 text-white rounded hover:bg-blue1">Edit Profile</button>
            </div>

            @if (auth()->user()->role == 'seller')
                
            <h2 class="text-xl font-semibold text-gray-800 my-4">Informasi Rekening</h2>
            @if (count($rekening) > 0)
            <div class="grid gap-2">
                @php
                $no = 1;
            @endphp
            @foreach ($rekening as $index => $rek)
            @if(is_array($rek))
            <div class="p-4  rounded border-2 border-gray-300 bg-gray-50">
                <div class="flex gap-4 mb-2">
                    <p class="font-semibold text-gray-700">Rekening {{ $index+1 }}</p>
                    <div>  
                        <button  data-modal-target="edit-rekening{{ $index }}" data-modal-toggle="edit-rekening{{ $index }}"><i class="text-blue2 fas fa-pen mr-3"></i></button>
                        <button  data-modal-target="hapus-rekening{{ $index }}" data-modal-toggle="hapus-rekening{{ $index }}"><i class="fa-regular fa-trash-can mr-3 text-red-600"></i></button>
                    </div>
                </div>
                <div class="ms-3">
                    <strong>Nama Bank:</strong> {{ $rek['nama_bank'] }}<br>
                    <strong>Nama Pemilik:</strong> {{ $rek['nama_pemilik'] }}<br>
                    <strong>No Rekening:</strong> {{ $rek['no_rekening'] }}<br>
                </div>
                @endif
            </div>
             
            {{-- edit rekening --}}
            <div id="edit-rekening{{ $index }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Rekening
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-rekening{{ $index }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="/edit-rekening" method="POST">
                        @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank</label>
                                <select name="edit_nama_bank" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="{{ $rek['nama_bank'] }}"  selected>{{ $rek['nama_bank'] }}</option>
                                    <option value="BCA">Bank Central Asia (BCA)</option>
                                    <option value="Mandiri">Bank Mandiri</option>
                                    <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                                    <option value="BNI">Bank Negara Indonesia (BNI)</option>
                                    <option value="BTN">Bank Tabungan Negara (BTN)</option>
                                    <option value="Danamon">Bank Danamon</option>
                                    <option value="CIMB">CIMB Niaga</option>
                                    <option value="Permata">Bank Permata</option>
                                    <option value="BTPN">Bank BTPN</option>
                                    <option value="OCBC">OCBC NISP</option>
                                    <option value="Panin">Bank Panin</option>
                                    <option value="Maybank">Maybank</option>
                                    <option value="Mega">Bank Mega</option>
                                    <option value="Bukopin">Bank Bukopin</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Commonwealth">Bank Commonwealth</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="Sinarmas">Bank Sinarmas</option>
                                    <option value="UOB">Bank UOB</option>
                                    <option value="Woori">Bank Woori Saudara</option>
                                    <option value="MNC">Bank MNC</option>
                                    <option value="Shinhan">Bank Shinhan Indonesia</option>
                                    <option value="ICBC">Bank ICBC Indonesia</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik Rekening</label>
                                <input type="text" name="edit_nama_pemilik" value="{{ $rek['nama_pemilik'] }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Pemilik Rekening" >
                                <input type="hidden" name="index" value="{{ $index }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Pemilik Rekening" >
                            </div>
                            @error('nama_pemilik')
                            <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
                            @enderror
                            <div class="col-span-2">
                                <label for="No Hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Rekening</label>
                                <input type="number" name="edit_no_rekening" value="{{ $rek['no_rekening'] }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Rekening" >
                            </div>
                            @error('no_rekening')
                            <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
                            @enderror
                            </div>
                            <button type="submit" id="simpan-data" class="text-white inline-flex items-center bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div> 
            {{-- delete --}}
            <div id="hapus-rekening{{ $index }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin menghapus no rekening ini?</h3>
                            <form action="hapus-rekening" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="index" value="{{ $index }}">
                                <div class="flex justify-center gap-4">
                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Ya, Hapus
                                    </button>
                                    <button data-modal-hide="hapus-rekening{{ $index }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 rounded-lg border border-gray-200 hover:bg-gray-400 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            @else
            <p class="italic text-red-600 font-semibold">Anda tidak dapat menjual produk jika belum ada no rekening pembayaran di toko anda!!</p>
            @endif 
        </div>

        <div class="mt-2 text-left flex gap-3">
            <button data-modal-target="tambah-rekening" data-modal-toggle="tambah-rekening" class="px-4 py-2 bg-blue2 text-white rounded hover:bg-blue1">Tambah No Rekening</button>
        </div>
    </div>
    @endif
  <!--  edit profil modal -->
  <div id="edit-profil" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-lg max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Edit Profil
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-profil">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
                <form class="p-4 md:p-5" action="/edit-profil" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Informasi Pribadi -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white ">Informasi Pribadi</h3>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="edit_username" readonly value="{{ $informasiAkun->username }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="edit_nama_lengkap" value="{{ $informasiAkun->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap Anda" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" readonly value="{{ $informasiAkun->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Hp</label>
                            @if ($informasiAkun->no_hp == NULL)
                            <input type="phone" name="edit_no_hp" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No HP Anda" required>
                            @else
                            <input type="phone" name="edit_no_hp" value="{{ $informasiAkun->no_hp }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>    
                            @endif
                        </div>
                        
                        <!-- Alamat -->
                        <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mt-2">Alamat</h3>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail Alamat</label>
                            @if ($informasiAkun->alamat == NULL)
                            <textarea name="edit_detail_alamat" id="description" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Perum xxx blok x no xx ...."></textarea>
                            @else
                            <textarea name="edit_detail_alamat" id="description" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Perum xxx blok x no xx ....">{{ $detailAlamat['detail_alamat'] }}</textarea>
                            @endif
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <select name="edit_provinsi" id="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @if ($informasiAkun->alamat == NULL)
                                <option value="" selected>Pilih Provinsi</option>      
                                @else
                                <option value="{{ $detailAlamat['provinsi'] }}" selected>{{ $detailAlamat['provinsi'] }}</option>      
                                @endif
                                @foreach ($provinces['rajaongkir']['results'] as $province)
                                    <option value="{{ $province['province'] }}">{{ $province['province'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1" id="kota">
                            <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten / Kota</label>
                            <select name="edit_kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @if ($informasiAkun->alamat == NULL)
                                <option value="" selected>Pilih Kota/Kabupaten</option> 
                                @else
                                <option value="{{ $detailAlamat['kota'] }}" selected>{{ $detailAlamat['kota'] }}</option>
                                @endif
                                @foreach ($kotaKota['rajaongkir']['results'] as $kota)
                                    <option value="{{ $kota['city_name'] }}">{{ $kota['city_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="edit_kode_pos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                            @if ($informasiAkun->alamat == NULL)
                            <input type="number" name="edit_kode_pos" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Pos" required>
                            @else
                            <input type="number" name="edit_kode_pos" value="{{ $detailAlamat['kode_pos'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Pos" required>
                            @endif
                        </div>
                        
                    </div>
                    <button type="submit" id="simpan-data" class="text-white inline-flex items-center bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                </form>


          </div>
      </div>
  </div> 
  <div id="tambah-rekening" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Tambah Rekening
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="tambah-rekening">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5" action="/tambah-rekening" method="POST">
                @csrf
                  <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank</label>
                        <select name="nama_bank" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled selected>Pilih Bank</option>
                            <option value="BCA">Bank Central Asia (BCA)</option>
                            <option value="Mandiri">Bank Mandiri</option>
                            <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                            <option value="BNI">Bank Negara Indonesia (BNI)</option>
                            <option value="BTN">Bank Tabungan Negara (BTN)</option>
                            <option value="Danamon">Bank Danamon</option>
                            <option value="CIMB">CIMB Niaga</option>
                            <option value="Permata">Bank Permata</option>
                            <option value="BTPN">Bank BTPN</option>
                            <option value="OCBC">OCBC NISP</option>
                            <option value="Panin">Bank Panin</option>
                            <option value="Maybank">Maybank</option>
                            <option value="Mega">Bank Mega</option>
                            <option value="Bukopin">Bank Bukopin</option>
                            <option value="Citibank">Citibank</option>
                            <option value="Commonwealth">Bank Commonwealth</option>
                            <option value="HSBC">HSBC</option>
                            <option value="Sinarmas">Bank Sinarmas</option>
                            <option value="UOB">Bank UOB</option>
                            <option value="Woori">Bank Woori Saudara</option>
                            <option value="MNC">Bank MNC</option>
                            <option value="Shinhan">Bank Shinhan Indonesia</option>
                            <option value="ICBC">Bank ICBC Indonesia</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik Rekening</label>
                        <input type="text" name="nama_pemilik"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Pemilik Rekening" required="">
                    </div>
                    @error('nama_pemilik')
                    <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
                    @enderror
                    <div class="col-span-2">
                        <label for="No Hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Rekening</label>
                        <input type="number" name="no_rekening"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Rekening" required="">
                    </div>
                    @error('no_rekening')
                    <p id="filled_error_help" class=" text-xs text-red-600 dark:text-red-400 text-red"><span class="font-medium">{{ $message }}</p>
                    @enderror
                  </div>
                  <button type="submit" id="simpan-data" class="text-white inline-flex items-center bg-blue2 hover:bg-blue1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      Tambah
                  </button>
              </form>
          </div>
      </div>
  </div> 
  
  
  @endsection




  {{-- <script>
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
  </script> --}}