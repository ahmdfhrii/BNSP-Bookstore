@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<style>

    main.flex-grow-1{
        background: #f8fafc;
        padding-top: 2rem !important;
        padding-bottom: 5rem !important;
    }

    :root{
        --navy: #1f2940;
        --yellow: #facc15;
    }

    /* =====================================
       HERO
    ===================================== */
    .hero-katalog{
        background: linear-gradient(135deg, #1f2940, #2f3c63);
        border-radius: 30px;
        padding: 70px 40px;
        position: relative;
        overflow: hidden;
    }

    .hero-katalog::before{
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        top: -100px;
        right: -100px;
    }

    .hero-katalog::after{
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        background: rgba(255,255,255,0.03);
        border-radius: 50%;
        bottom: -80px;
        left: -80px;
    }

    .hero-title{
        font-size: 3rem;
        font-weight: 800;
        color: white;
    }

    .hero-subtitle{
        color: rgba(255,255,255,0.75);
        max-width: 700px;
        margin: auto;
        line-height: 1.8;
    }

    /* =====================================
       FILTER
    ===================================== */
    .filter-card{
        background: white;
        border-radius: 24px;
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-top: -40px;
        position: relative;
        z-index: 10;
    }

    .search-input{
        border-radius: 14px;
        height: 52px;
        border: 1px solid #dbe2ea;
    }

    .search-input:focus{
        border-color: var(--navy);
        box-shadow: 0 0 0 0.2rem rgba(31,41,64,0.08);
    }

    .category-select{
        border-radius: 14px;
        height: 52px;
        border: 1px solid #dbe2ea;
    }

    .btn-search{
        height: 52px;
        border-radius: 14px;
        background: var(--navy);
        border: none;
        font-weight: 600;
    }

    .btn-search:hover{
        background: #111827;
    }

    /* =====================================
       BOOK CARD
    ===================================== */
    .book-card{
        border: none;
        border-radius: 24px;
        overflow: hidden;
        transition: 0.35s;
        background: white;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        height: 100%;
    }

    .book-card:hover{
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.10);
    }

    .book-image{
        height: 320px;
        object-fit: contain;
        padding: 25px;
        background: linear-gradient(to bottom, #f8fafc, #eef2ff);
    }

    .badge-category{
        background: #eef2ff;
        color: var(--navy);
        font-weight: 600;
        border-radius: 50px;
        padding: 8px 14px;
        font-size: 0.75rem;
    }

    .book-title{
        font-size: 1rem;
        font-weight: 700;
        color: var(--navy);

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;

        min-height: 48px;
    }

    .book-author{
        color: #64748b;
        font-size: 0.9rem;
    }

    .book-price{
        color: var(--navy);
        font-size: 1.2rem;
        font-weight: 800;
    }

    .btn-detail{
        border-radius: 14px;
        font-weight: 600;
        background: var(--navy);
        border: none;
        padding: 12px;
    }

    .btn-detail:hover{
        background: #111827;
        color: var(--yellow);
    }

    /* =====================================
       EMPTY
    ===================================== */
    .empty-state{
        background: white;
        border-radius: 30px;
        padding: 80px 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    /* =====================================
       PAGINATION
    ===================================== */
    .pagination{
        gap: 10px;
    }

    .page-link{
        border: none !important;
        border-radius: 12px !important;
        color: var(--navy);
        padding: 10px 16px;
        font-weight: 600;
    }

    .page-item.active .page-link{
        background: var(--navy);
        color: white;
    }

</style>

<div class="container">

    {{-- HERO --}}
    <div class="hero-katalog text-center mb-5">

        <h1 class="hero-title mb-3">
            Temukan Buku Favoritmu
        </h1>

        <p class="hero-subtitle">
            Jelajahi berbagai koleksi buku terbaik mulai dari teknologi,
            novel, bisnis, hingga pengembangan diri hanya di FahriBooks.
        </p>

    </div>

    {{-- FILTER --}}
    <div class="filter-card mb-5">

        <form action="{{ route('katalog') }}"
              method="GET">

            <div class="row g-3 align-items-center">

                {{-- CATEGORY --}}
                <div class="col-lg-3">
                    <select name="category"
                            class="form-select category-select"
                            onchange="this.form.submit()">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- SEARCH --}}
                <div class="col-lg-7">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control search-input"
                           placeholder="Cari judul buku atau penulis...">

                </div>

                {{-- BUTTON --}}
                <div class="col-lg-2">

                    <button type="submit"
                            class="btn btn-search text-white w-100">

                        <i class="bi bi-search me-2"></i>
                        Cari

                    </button>

                </div>

            </div>

        </form>

    </div>

    {{-- LIST BUKU --}}
    <div class="row g-4">

        @forelse($books as $book)

            <div class="col-6 col-md-4 col-lg-3">

                <div class="card book-card">

                    {{-- IMAGE --}}
                    @if($book->image)

                        <img src="{{ asset('storage/' . $book->image) }}"
                             alt="{{ $book->title }}"
                             class="card-img-top book-image">

                    @else

                        <img src="https://via.placeholder.com/300x400?text=No+Image"
                             alt="No Image"
                             class="card-img-top book-image">

                    @endif

                    {{-- BODY --}}
                    <div class="card-body d-flex flex-column">

                        <div class="mb-3">

                            <span class="badge badge-category">
                                {{ $book->category->name ?? 'Kategori' }}
                            </span>

                        </div>

                        <h5 class="book-title mb-2">
                            {{ $book->title }}
                        </h5>

                        <p class="book-author mb-3">
                            <i class="bi bi-pencil-square me-1"></i>
                            {{ $book->author }}
                        </p>

                        <div class="book-price mb-4">
                            Rp {{ number_format($book->price, 0, ',', '.') }}
                        </div>

                        <a href="{{ route('books.detail', $book->slug) }}"
                           class="btn btn-detail text-white mt-auto">

                            <i class="bi bi-book-half me-2"></i>
                            Detail Buku

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="empty-state text-center">

                    <i class="bi bi-journal-x text-secondary"
                       style="font-size: 5rem;"></i>

                    <h3 class="fw-bold text-muted mt-4">
                        Buku Tidak Ditemukan
                    </h3>

                    <p class="text-muted mt-2">
                        Coba gunakan kata kunci atau kategori lain.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-5">

        {{ $books->links('pagination::bootstrap-5') }}

    </div>

</div>

@endsection
