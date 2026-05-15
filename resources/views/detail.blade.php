@extends('layouts.app')

@section('title', $book->title)

@section('content')

<style>
    /* Kustomisasi khusus halaman Detail Buku */
    body {
        background-color: #f8fafc;
    }

    .book-cover-detail {
        width: 100%;
        max-width: 350px;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        object-fit: cover;
    }

    .badge-category {
        background-color: rgba(248, 177, 51, 0.15);
        color: var(--yellow-color);
        font-weight: 600;
        padding: 0.5em 1em;
        border-radius: 8px;
    }

    .price-tag {
        font-size: 2rem;
        font-weight: 700;
        color: var(--navy-color);
    }

    /* Kustomisasi Input Qty */
    .qty-input {
        width: 70px;
        text-align: center;
        border: 1px solid #e2e8f0;
        background-color: #f1f5f9;
        font-weight: 600;
        color: var(--navy-color);
    }
    .qty-input:focus {
        border-color: var(--yellow-color);
        box-shadow: none;
        outline: none;
    }
    .btn-qty {
        background-color: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: var(--navy-color);
        font-weight: bold;
        transition: 0.2s;
    }
    .btn-qty:hover {
        background-color: #e2e8f0;
    }

    /* Kustomisasi Tombol Keranjang */
    .btn-cart-add {
        background-color: var(--navy-color);
        color: white;
        border: none;
        font-weight: 600;
        border-radius: 12px;
        transition: 0.3s ease;
    }
    .btn-cart-add:hover {
        background-color: #1a233a;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(31, 41, 64, 0.15);
    }
</style>

<div class="container py-4 py-lg-5">

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('katalog') }}" class="text-decoration-none text-muted">Katalog</a></li>
            <li class="breadcrumb-item active text-navy fw-medium" aria-current="page">{{ $book->title }}</li>
        </ol>
    </nav>

    <div class="bg-white rounded-4 shadow-sm p-4 p-lg-5 border border-light">
        <div class="row align-items-center">

            <div class="col-lg-4 mb-5 mb-lg-0 text-center">
                @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="book-cover-detail">
                @else
                    <img src="https://via.placeholder.com/350x500?text=No+Image" alt="No Image" class="book-cover-detail">
                @endif
            </div>

            <div class="col-lg-8 ps-lg-5">

                <div class="mb-3">
                    <span class="badge-category">
                        <i class="bi bi-tag-fill me-1"></i>
                        {{ $book->category ? $book->category->name : 'Tanpa Kategori' }}
                    </span>
                </div>

                <h1 class="fw-bold text-navy mb-2" style="font-size: 2.5rem; letter-spacing: -1px;">
                    {{ $book->title }}
                </h1>
                <p class="text-muted fs-5 mb-4">Oleh: <span class="fw-medium text-dark">{{ $book->author }}</span></p>

                <div class="price-tag mb-4">
                    Rp {{ number_format($book->price, 0, ',', '.') }}
                </div>

                <h5 class="fw-bold text-navy mb-3">Deskripsi Buku</h5>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    {{ $book->description }}
                </p>

                <hr class="mb-4 text-muted">

                <div class="d-flex align-items-center mb-4">
                    @if($book->stock > 0)
                        <div class="text-success fw-medium px-3 py-2 rounded-3" style="background-color: #d1fae5;">
                            <i class="bi bi-check-circle-fill me-2"></i> Tersedia ({{ $book->stock }} Stok)
                        </div>
                    @else
                        <div class="text-danger fw-medium px-3 py-2 rounded-3" style="background-color: #fee2e2;">
                            <i class="bi bi-x-circle-fill me-2"></i> Stok Habis
                        </div>
                    @endif
                </div>

                @if($book->stock > 0)
                   <form action="{{ route('cart.store') }}" method="POST" class="d-flex flex-wrap gap-3 align-items-center">
                        @csrf

                        <input type="hidden" name="book_id" value="{{ $book->id }}">

                        <div class="input-group" style="width: 140px;">
                            <button class="btn btn-qty border-end-0" type="button" id="btn-minus" onclick="decreaseQty()">-</button>
                            <input type="number" name="quantity" id="qty-input" class="form-control qty-input border-start-0 border-end-0" value="1" min="1" max="{{ $book->stock }}" readonly>
                            <button class="btn btn-qty border-start-0" type="button" id="btn-plus" onclick="increaseQty()">+</button>
                        </div>

                        <button type="submit" class="btn btn-cart-add px-5 py-3 flex-grow-1 flex-md-grow-0">
                            <i class="bi bi-cart-plus fs-5 me-2 align-middle"></i> Masukkan Keranjang
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary px-5 py-3 rounded-3" disabled>
                        Tidak Tersedia
                    </button>
                @endif

            </div>
        </div>
    </div>
</div>

<script>
    const inputQty = document.getElementById('qty-input');
    const maxStock = {{ $book->stock }};

    function decreaseQty() {
        let currentValue = parseInt(inputQty.value);
        if (currentValue > 1) {
            inputQty.value = currentValue - 1;
        }
    }

    function increaseQty() {
        let currentValue = parseInt(inputQty.value);
        if (currentValue < maxStock) {
            inputQty.value = currentValue + 1;
        }
    }
</script>

@endsection
