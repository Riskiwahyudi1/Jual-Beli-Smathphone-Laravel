<?php

return [
    'required' => ':attribute harus diisi.',
    'reset' => 'Kata sandi Anda telah direset!',
    'sent' => 'Kami telah mengirimkan email yang berisi tautan untuk mereset kata sandi Anda!',
    'throttled' => 'Harap tunggu sebelum mencoba lagi.',
    'token' => 'Token reset kata sandi ini tidak valid.',
    'user' => "Kami tidak dapat menemukan pengguna dengan alamat email tersebut.",
    'min' => [
        'string' => ':attribute harus memiliki minimal :min karakter.',
    ],
    
    'custom' => [
        'username' => [
            'regex' => ':attribute tidak boleh mengandung spasi.',
            'unique' => ':attribute sudah digunakan. Harap pilih yang lain.'
        ],
        'email' => [
            'unique' => ':attribute sudah digunakan. Harap pilih yang lain.',
            'failed' => 'Email belum terdaftar!',
            'email' => 'Format email tidak sesuai!'
        ],
        'foto.*' => [
            'image' => 'Harap unggah file gambar (format: jpg, jpeg, png)',
            'mimes' => 'Harap unggah file dengan format: :values',
            'max' => 'Ukuran file tidak boleh lebih dari :max kilobytes',
        ],
        'token' => [
            'required' => 'Token Anda tidak valid.',
        ],
    ],
    
];

