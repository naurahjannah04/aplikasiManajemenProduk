@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h5 class="mb-0 fw-bold"><i class="bi bi-box-seam me-2 text-primary"></i>Daftar Produk</h5>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>Tambah Produk
            </a>
        </div>
    </div>

    {{-- Filter & Search --}}
    <div class="card-body border-bottom pb-3">
        <form method="GET" action="{{ route('products.index') }}" class="row g-2 align-items-end">
            <div class="col-sm-4">
                <label class="form-label form-label-sm mb-1">Cari Produk</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control"
                           placeholder="Kode / nama produk..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-sm-3">
                <label class="form-label form-label-sm mb-1">Filter Kategori</label>
                <select name="kategori" class="form-select form-select-sm">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoriList as $kat)
                        <option value="{{ $kat }}" {{ request('kategori') === $kat ? 'selected' : '' }}>
                            {{ $kat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <label class="form-label form-label-sm mb-1">Urutkan Harga</label>
                <select name="sort" class="form-select form-select-sm">
                    <option value="asc"  {{ request('sort', 'asc') === 'asc'  ? 'selected' : '' }}>Termurah</option>
                    <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Termahal</option>
                </select>
            </div>
            <div class="col-sm-2 d-flex gap-1">
                <button type="submit" class="btn btn-outline-primary btn-sm w-100">
                    <i class="bi bi-funnel me-1"></i>Filter
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        @if ($products->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                Data produk belum tersedia.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-3" style="width:50px">No</th>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th class="text-end">Harga</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center" style="width:180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $i => $product)
                            <tr>
                                <td class="ps-3 text-muted">{{ $products->firstItem() + $i }}</td>
                                <td><code>{{ $product->kode_produk }}</code></td>
                                <td class="fw-medium">{{ $product->nama_produk }}</td>
                                <td>
                                    <span class="badge bg-secondary bg-opacity-75">{{ $product->kategori }}</span>
                                </td>
                                <td class="text-end fw-semibold">{{ $product->harga_rupiah }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $product->status_stok_badge }} badge-stok">
                                        {{ $product->stok }} — {{ $product->status_stok }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex gap-1 btn-action">
                                        {{-- Detail --}}
                                        <a href="{{ route('products.show', $product) }}"
                                           class="btn btn-info btn-sm text-white" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        {{-- Edit --}}
                                        <a href="{{ route('products.edit', $product) }}"
                                           class="btn btn-warning btn-sm text-white" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        {{-- Hapus --}}
                                        <form action="{{ route('products.destroy', $product) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($products->hasPages())
                <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
                    <small class="text-muted">
                        Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }}
                        dari {{ $products->total() }} produk
                    </small>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
