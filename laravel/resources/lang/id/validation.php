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
    ],
    
];
