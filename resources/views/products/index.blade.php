@extends('layouts.app')

@section('content')
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
        <!-- Tambah Produk Button ketika data sudah ada -->
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
                    <td class="text-success fw-bold">
                        Rp{{ number_format($product->harga_jual,0,',','.') }}
                    </td>
                    <td>{{ $product->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" 
                           class="btn-icon btn-edit me-1" title="Edit">
                           <i class="fas fa-pen"></i>
                        </a>

                        <!-- Form hapus -->
                        <form id="delete-form-{{ $product->id }}" 
                              action="{{ route('products.destroy', $product->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" class="btn-icon btn-delete" 
                                onclick="confirmDelete({{ $product->id }})" 
                                title="Hapus">
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
@endsection

@push('scripts')
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
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'swal-feminim-popup',
            title: 'swal-feminim-title',
            confirmButton: 'swal-btn-confirm',
            cancelButton: 'swal-btn-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>
@endpush
