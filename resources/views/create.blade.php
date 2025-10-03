<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - The Sweet Life Clothing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/lvd-logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* === Font & Icon === */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Pacifico&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

        /* === Global Style === */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: url('../images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #222;
        }

        /* === Navbar Feminim === */
        .navbar {
            background: linear-gradient(90deg, #ffb6d9, #ff80bf);
            font-weight: 600;
            padding: 15px;
            border-bottom: 3px solid #ff99cc;
            box-shadow: 0 4px 10px rgba(255, 182, 193, 0.3);
        }

        .navbar .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 22px;
            color: white !important;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }

        .navbar .nav-link {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: white !important;
            margin: 0 10px;
            transition: 0.3s;
        }

        .navbar .nav-link:hover {
            color: #ffe6f2 !important;
            text-decoration: underline;
        }

        /* === Container Transparan === */
        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
        }

        /* === Table Custom Feminim Cantik === */
        .table.product-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #fff0f5;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 182, 193, 0.3);
        }

        .table.product-table thead {
            background: linear-gradient(90deg, #ff8fcf, #c77dff);
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 0.5px;
        }

        .table.product-table thead th {
            padding: 12px;
            border: none;
        }

        .table.product-table tbody td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ffe4ec;
            vertical-align: middle;
            font-size: 14px;
        }

        .table.product-table tbody tr:last-child td {
            border-bottom: none;
        }

        .table.product-table tbody tr:hover {
            background-color: #ffeaf4;
            transition: 0.3s;
        }

        /* Gambar produk */
        .product-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #ff9fcb;
            box-shadow: 0 2px 6px rgba(255, 182, 193, 0.3);
        }

        /* === Tombol Glowing Pink === */
        .btn-glow-pink {
            background: linear-gradient(45deg, #ff69b4, #ffb6c1);
            color: white !important;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.7);
            text-decoration: none;
            display: inline-block;
        }

        .btn-glow-pink:hover {
            box-shadow: 0 0 20px rgba(255, 20, 147, 1),
                        0 0 40px rgba(255, 182, 193, 0.9);
            transform: scale(1.05);
        }

        /* === Tombol Ikon Bulat === */
        .btn-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: none;
            color: #fff;
            font-size: 16px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-edit {
            background: linear-gradient(135deg, #28a745, #6ddf6d);
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.6);
        }
        .btn-edit:hover {
            box-shadow: 0 0 20px rgba(40, 167, 69, 0.9),
                        0 0 40px rgba(109, 223, 109, 0.7);
            transform: scale(1.1);
        }

        .btn-delete {
            background: linear-gradient(135deg, #dc3545, #ff6b81);
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.6);
        }
        .btn-delete:hover {
            box-shadow: 0 0 20px rgba(220, 53, 69, 0.9),
                        0 0 40px rgba(255, 107, 129, 0.7);
            transform: scale(1.1);
        }

        /* === Tombol Secondary (Kembali) === */
        .btn-secondary {
            background: linear-gradient(45deg, #aa0470, #df0d88);
            color: white !important;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #666, #444);
            box-shadow: 0 0 12px rgba(150, 150, 150, 0.6);
            transform: scale(1.05);
        }

        /* === Form Container === */
        .form-container {
            background: rgba(255, 240, 250, 0.95);
            padding: 30px;
            border-radius: 15px;
            max-width: 700px;
            margin: 30px auto;
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.25);
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            color: #c71585;
            margin-bottom: 25px;
        }

        /* Input Custom */
        .custom-input {
            border-radius: 10px;
            border: 1px solid #f4c2d7;
            padding: 10px;
            transition: all 0.3s;
        }

        .custom-input:focus {
            border-color: #ff69b4;
            box-shadow: 0 0 10px rgba(255, 182, 193, 0.6);
        }

        /* === Alert Error / Success === */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-danger {
            background: #ffe6f0;
            border: 1px solid #ff99b6;
            color: #d6336c;
            box-shadow: 0 3px 10px rgba(255, 105, 180, 0.25);
        }

        .alert-success {
            background: #e6fff0;
            border: 1px solid #8fd19e;
            color: #1e7e34;
            box-shadow: 0 3px 10px rgba(40, 167, 69, 0.25);
        }

        /* === Judul Halaman Data Produk === */
        .page-title {
            text-align: center;
            font-weight: bold;
            color: #d63384;
            margin-bottom: 25px;
        }

        /* === Empty State === */
        .empty-state {
            background: rgba(255, 240, 250, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(255, 182, 193, 0.25);
        }
        .empty-state .empty-img {
            width: 180px;
            opacity: 0.8;
        }
        .text-pink {
            color: #d63384 !important;
        }

        /* === Pagination Feminim === */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 8px;
        }

        .pagination .page-link {
            background: #ffe4ec;
            border: 1px solid #ffb6d9;
            border-radius: 8px;
            padding: 8px 14px;
            color: #d63384;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background: #ffb6d9;
            color: white;
            box-shadow: 0 0 8px rgba(255, 105, 180, 0.6);
        }

        .pagination .active .page-link {
            background: linear-gradient(45deg, #ff69b4, #ff85c1);
            border: none;
            color: white;
            box-shadow: 0 0 12px rgba(255, 105, 180, 0.8);
        }

        /* === Responsive CSS (Untuk Tampilan Mobile) === */
        @media (max-width: 768px) {

            /* Perbaikan umum untuk mobile */
            .container, .form-container {
                padding: 15px;
                margin-top: 15px;
            }

            .page-title, .form-title {
                font-size: 24px;
            }

            /* Membuat Navbar lebih rapi di mobile */
            .navbar .navbar-brand {
                margin-left: auto;
                margin-right: auto;
            }
            
            .navbar-nav {
                text-align: center;
                width: 100%;
            }

            .navbar .nav-link {
                margin: 5px 0;
            }

            /* Tombol menjadi full-width agar mudah disentuh */
            .btn-glow-pink, .btn-secondary {
                width: 100%;
                margin-bottom: 10px;
                text-align: center;
            }
            
            .form-container form a.btn-secondary {
                margin-top: 5px;
            }

            /* === Transformasi Tabel Menjadi Kartu (Card) === */
            .product-table thead {
                /* Sembunyikan header tabel di mobile */
                display: none;
            }

            .product-table tr {
                /* Setiap baris menjadi sebuah kartu */
                display: block;
                background: #fff0f5;
                border-radius: 15px;
                padding: 15px;
                margin-bottom: 15px;
                box-shadow: 0 4px 15px rgba(255, 182, 193, 0.3);
                border: 1px solid #ffe4ec;
            }

            .product-table td {
                /* Setiap sel menjadi satu baris di dalam kartu */
                display: block;
                text-align: right; /* Data di kanan, label di kiri */
                padding: 8px;
                border-bottom: 1px dashed #ffe4ec;
                position: relative;
            }
            
            .product-table td:last-child {
                border-bottom: none;
            }

            .product-table td::before {
                /* Tambahkan label kolom di kiri menggunakan atribut data-label */
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                color: #d63384;
                text-align: left;
            }

            /* Penyesuaian khusus untuk beberapa kolom */
            .product-table td:nth-of-type(1) {
                display: none; /* Sembunyikan kolom "No" karena tidak terlalu penting di mobile */
            }

            .product-table .product-img {
                /* Posisikan gambar di tengah kartu */
                display: block;
                margin: 0 auto 10px auto;
                width: 100px;
                height: 100px;
            }
            
            .product-table td[data-label="Gambar"]::before {
                display: none; /* Sembunyikan label "Gambar" */
            }
            
            .product-table td[data-label="Gambar"] {
                text-align: center;
            }

            .product-table td[data-label="Aksi"] {
                text-align: center; /* Aksi di tengah */
                padding-top: 15px;
            }
            
            .product-table td[data-label="Aksi"]::before {
                display: none; /* Sembunyikan label "Aksi" */
            }
        }
    </style>
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