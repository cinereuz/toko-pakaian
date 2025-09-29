<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - The Sweet Life Clothing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/lvd-logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <h2 class="form-title">✨ Tambah Produk ✨</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>⚠️ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control custom-input" value="{{ old('kategori') }}" required>
                </div>
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control custom-input" value="{{ old('nama_produk') }}" required>
                </div>
                <div class="mb-3">
                    <label>Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control custom-input" step="0.01" value="{{ old('harga_jual') }}" required>
                </div>
                <div class="mb-3">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control custom-input">
                </div>
                <button class="btn btn-glow-pink">💾 Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
