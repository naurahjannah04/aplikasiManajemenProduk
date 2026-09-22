<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id ?? $this->route('product');

        return [
            'kode_produk'  => [
                'required',
                'string',
                'max:20',
                Rule::unique('products', 'kode_produk')->ignore($productId),
            ],
            'nama_produk'  => ['required', 'string', 'max:100'],
            'kategori'     => ['required', 'string', 'max:50'],
            'harga'        => ['required', 'numeric', 'min:0'],
            'stok'         => ['required', 'integer', 'min:0'],
            'deskripsi'    => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode_produk.required'  => 'Kode produk wajib diisi.',
            'kode_produk.unique'    => 'Kode produk sudah digunakan.',
            'nama_produk.required'  => 'Nama produk wajib diisi.',
            'kategori.required'     => 'Kategori wajib diisi.',
            'harga.required'        => 'Harga wajib diisi.',
            'harga.numeric'         => 'Harga harus berupa angka.',
            'harga.min'             => 'Harga minimal 0.',
            'stok.required'         => 'Stok wajib diisi.',
            'stok.integer'          => 'Stok harus bilangan bulat.',
            'stok.min'              => 'Stok minimal 0.',
        ];
    }
}