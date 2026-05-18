@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<style>
    main.flex-grow-1 {
        display: block !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    .hover-lift {
        transition: 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }
    .phone-wrapper { position: relative; }
    .bg-shape-phone {
        width: 320px; height: 320px;
        background: linear-gradient(135deg, var(--navy-color), #334155);
        border-radius: 50%;
        position: absolute; z-index: -1;
    }
    .phone-mockup {
        width: 270px; height: 540px;
        border: 12px solid #1f2937; border-radius: 40px;
        background: linear-gradient(to bottom, #ffffff, #f8fafc);
        overflow: hidden; position: relative; display: flex;
        align-items: center; justify-content: center;
        box-shadow: 0 30px 60px rgba(0,0,0,0.18);
    }
    .phone-notch {
        width: 130px; height: 22px;
        background: #1f2937; position: absolute; top: 0;
        border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;
    }
    .phone-mockup img { transition: 0.4s ease; }
    .phone-mockup:hover img { transform: scale(1.05); }

    @media(max-width: 991px) {
        .about-logo-circle { width: 220px !important; height: 220px !important; }
        .phone-mockup { width: 230px; height: 470px; }
        .bg-shape-phone { width: 280px; height: 280px; }
    }
</style>

<section class="position-relative d-flex align-items-center overflow-hidden"
         style="min-height: 90vh; background: url('{{ asset('storage/images/hero.png') }}') center/cover no-repeat;">

    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: linear-gradient(to right, rgba(15,23,42,0.92), rgba(15,23,42,0.55));"></div>

    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="fw-bold text-white mb-4 display-4 display-lg-3" style="letter-spacing: -1.5px;">
                    Temukan Buku Favoritmu <span class="text-yellow">Lebih Mudah</span>
                </h1>
                <p class="fs-5 mb-5 text-white opacity-75" style="max-width: 650px; line-height: 1.9;">
                    FahriBooks membantu kamu menemukan buku terbaik kapan saja dan di mana saja.
                </p>
                <a href="/katalog" class="btn btn-yellow px-5 py-3 rounded-pill fw-semibold shadow-lg">
                    Mulai Membaca <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5 border-bottom">
    <div class="container">
        <div class="row g-4 text-center">

            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center text-yellow"
                         style="width: 70px; height: 70px; background: rgba(248,177,51,0.1); font-size: 2rem;">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="text-start">
                        <h4 class="fw-bold text-navy mb-1">10.000+ Buku</h4>
                        <small class="text-muted">Koleksi buku terlengkap</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center text-yellow"
                         style="width: 70px; height: 70px; background: rgba(248,177,51,0.1); font-size: 2rem;">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="text-start">
                        <h4 class="fw-bold text-navy mb-1">10.000+ Pengguna</h4>
                        <small class="text-muted">Dipercaya pembaca Indonesia</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center text-yellow"
                         style="width: 70px; height: 70px; background: rgba(248,177,51,0.1); font-size: 2rem;">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div class="text-start">
                        <h4 class="fw-bold text-navy mb-1">Proses Cepat</h4>
                        <small class="text-muted">Pengiriman cepat dan praktis</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="bg-white py-5">
    <div class="container py-4">

        <div class="rounded-5 p-4 p-lg-5 text-white position-relative overflow-hidden"
             style="background: linear-gradient(135deg, var(--navy-color), #334155);">

            <div class="position-absolute rounded-circle"
                 style="width: 350px; height: 350px; background: rgba(255,255,255,0.05); top: -100px; right: -100px;"></div>

<div class="row align-items-center position-relative" style="z-index: 2;">

    <div class="col-lg-7 mb-5 mb-lg-0" id="tentang">

        <h2 class="fw-bold mb-4">
            Tentang Kami
        </h2>

        <p class="opacity-75 mb-4" style="line-height: 1.9;">

            FahriBooks adalah toko buku online yang menyediakan
            berbagai pilihan buku berkualitas dari beragam kategori,
            mulai dari teknologi, pendidikan, novel, komik,
            hingga pengembangan diri.

        </p>

        <p class="opacity-75 mb-5" style="line-height: 1.9;">

            Kami hadir untuk membantu pembaca menemukan buku favorit
            dengan lebih mudah, cepat, dan nyaman melalui pengalaman
            belanja digital yang modern, aman, dan terpercaya.

        </p>

        <a href="/katalog"
           class="btn btn-yellow px-4 py-3 rounded-pill fw-semibold shadow-sm">

            Belanja Sekarang
            <i class="bi bi-arrow-right ms-2"></i>

        </a>

    </div>

    <div class="col-lg-5 d-flex justify-content-center">

        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center shadow-lg about-logo-circle"
             style="width: 280px; height: 280px;">

            <img src="{{ asset('storage/images/fahribooks.png') }}"
                 width="180"
                 alt="Logo">

        </div>

    </div>

</div>

        </div>
    </div>
</section>

<section class="py-5" style="background-color: var(--light-bg);">
    <div class="container py-4">

        <h2 class="fw-bold text-center text-navy mb-3" style="font-size: 2.5rem; letter-spacing: -1px;">Kategori Terlaris</h2>
        <p class="text-center text-muted mx-auto mb-5" style="max-width: 650px; line-height: 1.9;">
            Temukan kategori buku favorit yang paling banyak diminati pengguna FahriBooks.
        </p>

        <div class="row g-4">
            <div class="col-6 col-lg-3">
                <div class="card h-100 border-0 rounded-4 p-4 text-center hover-lift shadow-sm">
                    <div class="rounded-4 mx-auto mb-4 d-flex align-items-center justify-content-center text-white"
                         style="width: 100px; height: 100px; font-size: 2.5rem; background: linear-gradient(135deg, var(--navy-color), #334155);">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-0">Teknologi</h5>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card h-100 border-0 rounded-4 p-4 text-center hover-lift shadow-sm">
                    <div class="rounded-4 mx-auto mb-4 d-flex align-items-center justify-content-center text-white"
                         style="width: 100px; height: 100px; font-size: 2.5rem; background: linear-gradient(135deg, var(--navy-color), #334155);">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-0">Pendidikan</h5>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card h-100 border-0 rounded-4 p-4 text-center hover-lift shadow-sm">
                    <div class="rounded-4 mx-auto mb-4 d-flex align-items-center justify-content-center text-white"
                         style="width: 100px; height: 100px; font-size: 2.5rem; background: linear-gradient(135deg, var(--navy-color), #334155);">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-0">Novel</h5>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card h-100 border-0 rounded-4 p-4 text-center hover-lift shadow-sm">
                    <div class="rounded-4 mx-auto mb-4 d-flex align-items-center justify-content-center text-white"
                         style="width: 100px; height: 100px; font-size: 2.5rem; background: linear-gradient(135deg, var(--navy-color), #334155);">
                        <i class="bi bi-stars"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-0">Komik</h5>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="bg-white overflow-hidden py-5">
    <div class="container py-5">
        <div class="row align-items-center">

            <div class="col-lg-5 mb-5 mb-lg-0 d-flex justify-content-center">
                <div class="phone-wrapper">
                    <div class="bg-shape-phone"></div>
                    <div class="phone-mockup">
                        <div class="phone-notch"></div>
                        <img src="{{ asset('storage/images/fahribooks.png') }}" width="140" alt="App Preview">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <h2 class="fw-bold text-navy mb-3" style="font-size: 2.5rem;">Keunggulan FahriBooks</h2>
                <p class="text-muted mb-5">Nikmati pengalaman membaca dan meminjam buku yang lebih modern dan nyaman.</p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="bg-white rounded-4 p-3 d-flex align-items-center gap-3 hover-lift border shadow-sm">
                            <div class="rounded-3 d-flex align-items-center justify-content-center text-yellow"
                                 style="width: 50px; height: 50px; background: rgba(248,177,51,0.15); font-size: 1.3rem;">
                                <i class="bi bi-phone"></i>
                            </div>
                            <span class="fw-semibold text-navy">Mudah Diakses</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white rounded-4 p-3 d-flex align-items-center gap-3 hover-lift border shadow-sm">
                            <div class="rounded-3 d-flex align-items-center justify-content-center text-yellow"
                                 style="width: 50px; height: 50px; background: rgba(248,177,51,0.15); font-size: 1.3rem;">
                                <i class="bi bi-tag"></i>
                            </div>
                            <span class="fw-semibold text-navy">Harga Terjangkau</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white rounded-4 p-3 d-flex align-items-center gap-3 hover-lift border shadow-sm">
                            <div class="rounded-3 d-flex align-items-center justify-content-center text-yellow"
                                 style="width: 50px; height: 50px; background: rgba(248,177,51,0.15); font-size: 1.3rem;">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <span class="fw-semibold text-navy">Aman & Terpercaya</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white rounded-4 p-3 d-flex align-items-center gap-3 hover-lift border shadow-sm">
                            <div class="rounded-3 d-flex align-items-center justify-content-center text-yellow"
                                 style="width: 50px; height: 50px; background: rgba(248,177,51,0.15); font-size: 1.3rem;">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <span class="fw-semibold text-navy">Proses Cepat</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5" style="background-color: var(--light-bg);">
    <div class="container py-4">

        <h2 class="fw-bold text-center text-navy mb-3" style="font-size: 2.5rem; letter-spacing: -1px;">Apa Kata Pengguna?</h2>
        <p class="text-center text-muted mx-auto mb-5" style="max-width: 650px; line-height: 1.9;">
            Pengalaman pengguna FahriBooks dari berbagai kalangan.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 rounded-4 p-4 p-lg-5 text-center hover-lift shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Siti+Nurbaya&background=random" class="rounded-circle mx-auto mb-3 object-fit-cover" style="width: 80px; height: 80px;" alt="User">
                    <h5 class="fw-bold text-navy">Siti Nurbaya</h5>
                    <small class="text-muted d-block mb-3">Mahasiswa</small>
                    <p class="text-muted small mb-4">“Sangat membantu saya mencari referensi buku untuk tugas kuliah. Fiturnya mudah digunakan.”</p>
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 rounded-4 p-4 p-lg-5 text-center hover-lift shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=random" class="rounded-circle mx-auto mb-3 object-fit-cover" style="width: 80px; height: 80px;" alt="User">
                    <h5 class="fw-bold text-navy">Budi Santoso</h5>
                    <small class="text-muted d-block mb-3">Pekerja IT</small>
                    <p class="text-muted small mb-4">“Koleksi bukunya lengkap dan proses pengirimannya sangat cepat. Recommended banget!”</p>
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 rounded-4 p-4 p-lg-5 text-center hover-lift shadow-sm">
                    <img src="https://ui-avatars.com/api/?name=Rina+Amelia&background=random" class="rounded-circle mx-auto mb-3 object-fit-cover" style="width: 80px; height: 80px;" alt="User">
                    <h5 class="fw-bold text-navy">Rina Amelia</h5>
                    <small class="text-muted d-block mb-3">Guru SMA</small>
                    <p class="text-muted small mb-4">“Tampilan modern dan nyaman digunakan. Sangat cocok untuk pecinta buku.”</p>
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="position-relative overflow-hidden text-white py-5"
         style="background: linear-gradient(135deg, var(--navy-color), #334155);">

    <div class="position-absolute rounded-circle"
         style="width: 450px; height: 450px; background: rgba(255,255,255,0.05); top: -180px; right: -120px; z-index: 1;"></div>

    <div class="container position-relative py-5 text-center" style="z-index: 2;">
        <p class="text-white-50 fw-medium mb-2">Mulai Sekarang</p>
        <h1 class="fw-bold mb-3 display-5">Mulai Petualangan Membacamu</h1>
        <p class="mb-5 text-white-50 fs-5">Temukan ribuan buku menarik hanya di FahriBooks</p>
        <a href="/katalog" class="btn btn-yellow px-5 py-3 rounded-pill fw-semibold fs-5 shadow-lg">
            <i class="bi bi-search me-2"></i> Cari Buku
        </a>
    </div>
</section>

@endsection
