<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 
        
        ];
        protected $fillable = [
            'user_id',
            'produk_id',
            'user_id',
            'jumlah',
            'status',
            'harga',
            'alamat',
            'penjual',
            'ongkir',
            'expedisi',
            'bukti_pembayaran',
    ];
    public function scopeTransaksiFilter($query, array $filters)
    {

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('status', $status);
        });

        return $query;
    }
    public function Produk(){
        return $this->belongsTo(Produk::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
