<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Produk') — Toko Kita</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
    :root {
        --bs-primary: #DCCBB8;
        --bs-primary-rgb: 220, 203, 184;
        --bs-primary-text-emphasis: #7a624f;
        --bs-primary-bg-subtle: #f3eae1;
        --bs-secondary: #f8f9fa;
        --bs-success: #198754;
        --bs-danger: #dc3545;
        --bs-warning: #ffc107;
        --bs-info: #0dcaf0;
    }

    body { background-color: #f8f9fa; }
    .navbar-dark.bg-primary {
        background-color: #DCCBB8 !important;
    }
    .navbar-brand { font-weight: 700; letter-spacing: .5px; }
    .table th { background-color: #DCCBB8; color: #fff; vertical-align: middle; }
    .table td { vertical-align: middle; }
    .btn-action { white-space: nowrap; }
    .card { box-shadow: 0 2px 8px rgba(0,0,0,.08); border: none; }
    .card-header { border-bottom: 2px solid #DCCBB8; }

    .btn-primary {
        background-color: #DCCBB8 !important;
        border-color: #DCCBB8 !important;
        color: #fff !important;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
        background-color: #c8b09a !important;
        border-color: #c8b09a !important;
        color: #fff !important;
    }

    .btn-outline-primary {
        color: #DCCBB8 !important;
        border-color: #DCCBB8 !important;
    }

    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active {
        background-color: #DCCBB8 !important;
        border-color: #DCCBB8 !important;
        color: #fff !important;
    }

    .form-label { font-weight: 500; }
    .badge-stok { font-size: .8rem; }

    .badge.bg-primary {
        background-color: #DCCBB8 !important;
    }

    .page-link {
        color: #DCCBB8;
    }

    .page-item.active .page-link {
        background-color: #DCCBB8;
        border-color: #DCCBB8;
    }

    a { color: #DCCBB8; }
    a:hover { color: #c8b09a; }
</style>
@stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('products.index') }}">
            <i class="bi bi-box-seam me-2"></i>Manajemen Produk
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('products.index') }}">
                        <i class="bi bi-list-ul me-1"></i>Daftar Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.create') ? 'active fw-bold' : '' }}"
                       href="{{ route('products.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Produk
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-4">

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<footer class="text-center text-muted py-3 border-top mt-4">
    <small>Aplikasi CRUD Produk &mdash; Naurah Jannah Alice &copy; {{ date('Y') }}</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>