<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
    ];

    protected $casts = [
        'harga' => 'integer',
        'stok'  => 'integer',
    ];

    // Helper: format harga ke Rupiah
    public function getHargaRupiahAttribute(): string
    {
        return 'Rp' . number_format($this->harga, 0, ',', '.');
    }

    // Helper: label stok
    public function getStatusStokAttribute(): string
    {
        if ($this->stok === 0) return 'Stok Habis';
        if ($this->stok <= 5) return 'Stok Menipis';
        return 'Stok Tersedia';
    }

    public function getStatusStokBadgeAttribute(): string
    {
        return match (true) {
            $this->stok === 0  => 'danger',
            $this->stok <= 5   => 'warning',
            default            => 'success',
        };
    }
}
