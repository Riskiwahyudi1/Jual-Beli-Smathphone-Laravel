<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function scopeHomeFilter($query, array $filters)
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

    public function Kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function Transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
