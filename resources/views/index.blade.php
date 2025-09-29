<!DOCTYPE html>
<html>
<head>
    <title>The Sweet Life Clothing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/lvd-logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2d9d5c123.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">La Vie Douce</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Data Produk</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Data Kategori</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Revalina Putri</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <h2 class="page-title">🌸 Data Produk 🌸</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success shadow-sm rounded-pill text-center">
                {{ $message }}
            </div>
        @endif

        @if($products->count() == 0)
            <div class="empty-state text-center">
                <img src="{{ asset('images/empty.png') }}" class="empty-img" alt="No Product">
                <h5 class="mt-3 text-muted">Belum ada produk nih 💕</h5>
                <p class="text-muted">Yuk, tambahkan produk pertamamu sekarang!</p>
                <a href="{{ route('products.create') }}" class="btn btn-glow-pink">✨ Tambah Produk Pertama ✨</a>
            </div>
        @else
            <div class="mb-3 text-end">
                <a href="{{ route('products.create') }}" class="btn btn-glow-pink">➕ Tambah Produk</a>
            </div>

            <table class="table product-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga Jual</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $i => $product)
                    <tr>
                        <td>{{ $i + $products->firstItem() }}</td>
                        <td>
                            @if($product->gambar)
                                <img src="{{ asset('storage/'.$product->gambar) }}" class="product-img">
                            @endif
                        </td>
                        <td>{{ $product->kategori }}</td>
                        <td class="fw-semibold text-pink">{{ $product->nama_produk }}</td>
                        <td class="text-success fw-bold">Rp{{ number_format($product->harga_jual,0,',','.') }}</td>
                        <td>{{ $product->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-icon btn-edit me-1" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn-icon btn-delete" onclick="confirmDelete({{ $product->id }})" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        @endif
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah kamu yakin? 💔',
            text: "Produk ini akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff69b4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
    </script>
</body>
</html>
