<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    // GET /api/products (MENAMPILKAN SEMUA PRODUK)
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // POST /api/products (MENAMBAH PRODUK)
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'gambar' => 'nullable|string'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product
        ], 201);
    }

    // GET /api/products/{id} (LIHAT DETAIL PRODUK)
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
        return response()->json($product);
    }

    // PUT /api/products/{id} (UPDATE)
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $request->validate([
            'kategori' => 'sometimes|required|string|max:255',
            'nama_produk' => 'sometimes|required|string|max:255',
            'harga_jual' => 'sometimes|required|numeric',
            'gambar' => 'nullable|string'
        ]);

        $product->update($request->all());

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'data' => $product
        ]);
    }

    // DELETE /api/products/{id} (MENGHAPUS PRODUK)
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
