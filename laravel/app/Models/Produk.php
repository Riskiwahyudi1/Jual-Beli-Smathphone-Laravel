<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'terjual'];
    protected $fillable = [
        'kategori_id',
        'user_id',
        'nama_produk',
        'deskripsi',
        'spesifikasi',
        'harga',
        'stok',
        'terjual',
        'diskon',
        'brand',
        'foto',
        'status'
    ];

    protected $casts = [
        'spesifikasi' => 'array', 
        // 'foto' => 'array', 
    ];
    protected $attributes = [
        'terjual' => 0, 
    ];
    
    public function scopePopulerFilter($query, array $filters)
    {
        $query->orderByDesc('terjual');

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_produk', 'like', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->with('kategori')->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });

        $query->when($filters['brand'] ?? false, function ($query, $brand) {
            return $query->where('brand', $brand);
        });

        return $query;
    }
    public function scopeVerifikasiFilter($query, array $filters)
    {
       

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_produk', 'like', '%' . $search . '%');
        });

        $query->when($filters['status'] ?? false, function ($query, $brand) {
            return $query->where('status', $brand);
        });

        return $query;
    }

    public function Kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function Transaksi(){
        return $this->hasMany(Transaksi::class);
    }
    public function keranjang(){
        return $this->hasMany(Keranjang::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
