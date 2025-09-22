<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil data produk terbaru (paginate 5 per halaman)
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required',
            'harga_jual' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('images', 'public');
        }

        Product::create([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'harga_jual' => $request->harga_jual,
            'gambar' => $gambar,
        ]);

        // Redirect kembali ke index
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required',
            'harga_jual' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $gambar = $product->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambar && Storage::disk('public')->exists($gambar)) {
                Storage::disk('public')->delete($gambar);
            }
            $gambar = $request->file('gambar')->store('images', 'public');
        }

        $product->update([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'harga_jual' => $request->harga_jual,
            'gambar' => $gambar,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
