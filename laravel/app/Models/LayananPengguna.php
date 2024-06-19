<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPengguna extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id', 
        ];
    protected $fillable = [
        'nama',
        'user_id',
        'email',
        'pengaduan',
        'pesan',
        'status',
    ];
}
