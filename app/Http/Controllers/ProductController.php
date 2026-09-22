<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Tugas 3 — READ: Tampilkan daftar produk.
     */
    public function index(Request $request): View
    {
        $query = Product::query();

        // Bonus HOTS: Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_produk', 'like', "%{$search}%")
                  ->orWhere('nama_produk', 'like', "%{$search}%");
            });
        }

        // Bonus HOTS: Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Bonus HOTS: Sorting harga
        $sort = $request->get('sort', 'asc');
        if (in_array($sort, ['asc', 'desc'])) {
            $query->orderBy('harga', $sort);
        } else {
            $query->latest();
        }

        // Bonus HOTS: Pagination 10 per halaman
        $products   = $query->paginate(10)->withQueryString();
        $kategoriList = Product::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori');

        return view('products.index', compact('products', 'kategoriList'));
    }

    /**
     * Tugas 4 — CREATE: Tampilkan form tambah produk.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Tugas 4 & 5 — CREATE + VALIDASI: Simpan produk baru.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Tugas 6 — READ: Tampilkan detail satu produk.
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Tugas 7 — UPDATE: Tampilkan form edit produk.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Tugas 7 & 5 — UPDATE + VALIDASI: Simpan perubahan data produk.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Tugas 8 — DELETE: Hapus produk dari database.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
