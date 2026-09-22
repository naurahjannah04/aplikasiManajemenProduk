<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'kode_produk'  => 'PRD001',
                'nama_produk'  => 'Keyboard Mechanical',
                'kategori'     => 'Elektronik',
                'harga'        => 350000,
                'stok'         => 10,
                'deskripsi'    => 'Keyboard mechanical RGB dengan switch brown, cocok untuk gaming dan mengetik.',
            ],
            [
                'kode_produk'  => 'PRD002',
                'nama_produk'  => 'Mouse Wireless',
                'kategori'     => 'Elektronik',
                'harga'        => 150000,
                'stok'         => 20,
                'deskripsi'    => 'Mouse wireless dengan DPI adjustable 800–3200.',
            ],
            [
                'kode_produk'  => 'PRD003',
                'nama_produk'  => 'Headset Gaming',
                'kategori'     => 'Elektronik',
                'harga'        => 275000,
                'stok'         => 5,
                'deskripsi'    => 'Headset gaming dengan suara surround 7.1 dan microphone noise-cancelling.',
            ],
            [
                'kode_produk'  => 'PRD004',
                'nama_produk'  => 'Tas Laptop 14 Inch',
                'kategori'     => 'Aksesoris',
                'harga'        => 120000,
                'stok'         => 0,
                'deskripsi'    => null,
            ],
            [
                'kode_produk'  => 'PRD005',
                'nama_produk'  => 'Monitor LED 24"',
                'kategori'     => 'Elektronik',
                'harga'        => 1850000,
                'stok'         => 3,
                'deskripsi'    => 'Monitor LED IPS Full HD 75Hz, cocok untuk kerja dan multimedia.',
            ],
        ];

        foreach ($products as $data) {
            Product::firstOrCreate(['kode_produk' => $data['kode_produk']], $data);
        }
    }
}
