@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}">Daftar Produk</a>
                </li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-plus-circle me-2 text-primary"></i>Tambah Produk Baru
                </h5>
            </div>
            <div class="card-body">

                <form action="{{ route('products.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="row g-3">

                        {{-- Kode Produk --}}
                        <div class="col-md-6">
                            <label for="kode_produk" class="form-label">
                                Kode Produk <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="kode_produk" name="kode_produk"
                                   class="form-control @error('kode_produk') is-invalid @enderror"
                                   value="{{ old('kode_produk') }}"
                                   placeholder="Contoh: PRD001"
                                   maxlength="20">
                            @error('kode_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nama Produk --}}
                        <div class="col-md-6">
                            <label for="nama_produk" class="form-label">
                                Nama Produk <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="nama_produk" name="nama_produk"
                                   class="form-control @error('nama_produk') is-invalid @enderror"
                                   value="{{ old('nama_produk') }}"
                                   placeholder="Nama produk"
                                   maxlength="100">
                            @error('nama_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="col-md-6">
                            <label for="kategori" class="form-label">
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="kategori" name="kategori"
                                   class="form-control @error('kategori') is-invalid @enderror"
                                   value="{{ old('kategori') }}"
                                   placeholder="Contoh: Elektronik"
                                   maxlength="50">
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="col-md-3">
                            <label for="harga" class="form-label">
                                Harga (Rp) <span class="text-danger">*</span>
                            </label>
                            <input type="number" id="harga" name="harga"
                                   class="form-control @error('harga') is-invalid @enderror"
                                   value="{{ old('harga', 0) }}"
                                   min="0" placeholder="0">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Stok --}}
                        <div class="col-md-3">
                            <label for="stok" class="form-label">
                                Stok <span class="text-danger">*</span>
                            </label>
                            <input type="number" id="stok" name="stok"
                                   class="form-control @error('stok') is-invalid @enderror"
                                   value="{{ old('stok', 0) }}"
                                   min="0" placeholder="0">
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                            <label for="deskripsi" class="form-label">
                                Deskripsi <span class="text-muted fw-normal">(opsional)</span>
                            </label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Deskripsi produk...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>{{-- /row --}}

                    <hr class="my-4">

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Simpan Produk
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
