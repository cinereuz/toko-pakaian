@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2 class="form-title">✨ Edit Produk ✨</h2>

    <!-- Pesan error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control custom-input" 
                   value="{{ old('kategori', $product->kategori) }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control custom-input" 
                   value="{{ old('nama_produk', $product->nama_produk) }}" required>
        </div>

        <div class="mb-3">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control custom-input" 
                   value="{{ old('harga_jual', $product->harga_jual) }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar</label><br>
            @if($product->gambar)
                <img src="{{ asset('storage/'.$product->gambar) }}" width="120" class="mb-2 rounded shadow border border-pink">
            @endif
            <input type="file" name="gambar" class="form-control custom-input">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
        </div>

        <button type="submit" class="btn btn-glow-pink">✅ Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
@endsection
