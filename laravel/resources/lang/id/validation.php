<?php

return [
    'required' => ':attribute harus diisi.',
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
    ],
    
];

