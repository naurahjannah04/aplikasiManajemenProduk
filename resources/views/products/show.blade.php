@extends('layouts.app')

@section('title', 'Detail Produk — ' . $product->nama_produk)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}">Daftar Produk</a>
                </li>
                <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-box-seam me-2 text-primary"></i>Detail Produk
                </h5>
                <span class="badge bg-{{ $product->status_stok_badge }} fs-6 px-3">
                    {{ $product->status_stok }}
                </span>
            </div>

            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <th class="text-muted fw-normal" style="width:35%">Kode Produk</th>
                            <td class="fw-semibold"><code>{{ $product->kode_produk }}</code></td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Nama Produk</th>
                            <td class="fw-semibold">{{ $product->nama_produk }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Kategori</th>
                            <td>
                                <span class="badge bg-secondary">{{ $product->kategori }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Harga</th>
                            <td class="fw-bold text-success fs-5">{{ $product->harga_rupiah }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Stok</th>
                            <td>{{ $product->stok }} unit</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Deskripsi</th>
                            <td>
                                @if ($product->deskripsi)
                                    {{ $product->deskripsi }}
                                @else
                                    <span class="text-muted fst-italic">Tidak ada deskripsi.</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Dibuat</th>
                            <td class="text-muted small">{{ $product->created_at->isoFormat('D MMMM YYYY, HH:mm') }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted fw-normal">Diperbarui</th>
                            <td class="text-muted small">{{ $product->updated_at->isoFormat('D MMMM YYYY, HH:mm') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white d-flex gap-2 justify-content-end py-3">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning text-white">
                    <i class="bi bi-pencil me-1"></i>Edit Produk
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
