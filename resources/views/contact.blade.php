@extends('layouts.app')

@section('title', 'Hubungi Kami - FahriBooks')

@section('content')

<style>
    .contact-card {
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease-in-out;
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        border-color: #0056b3;
    }
</style>

<div class="container py-5 my-md-4">

    {{-- Header Section --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-navy mb-3">Hubungi Kami</h2>
        <p class="text-muted fs-5 max-w-700 mx-auto">
            Punya pertanyaan seputar pesanan, ketersediaan buku, atau kendala teknis?
            Tim FahriBooks siap membantu Anda melalui saluran di bawah ini.
        </p>
    </div>
    <div class="row g-4 justify-content-center align-items-stretch">
        <div class="col-lg-6">
            <div class="card shadow-sm rounded-4 h-100 contact-card bg-white">
                <div class="card-body p-4 p-md-5 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-4">

                    {{-- Teks di Kiri --}}
                    <div>
                        <h4 class="fw-bold text-dark mb-2">Live Chat</h4>
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">
                            Melayani pada pukul 08:00 - 17.00 WIB
                        </p>
                    </div>

                    {{-- Tombol di Kanan --}}
                    <div>
                        <a href="https://wa.me/62895412946795"
                           target="_blank"
                           class="btn btn-primary px-4 py-2 fw-bold rounded-3 text-nowrap"
                           style="background-color: #0056b3; border: none;">
                            <i class="bi bi-chat-dots-fill me-2"></i> Chat Sekarang
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- KOTAK KANAN: Email --}}
        <div class="col-lg-6">
            <div class="card shadow-sm rounded-4 h-100 contact-card bg-white">
                <div class="card-body p-4 p-md-5 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-4">

                    {{-- Teks di Kiri --}}
                    <div>
                        <h4 class="fw-bold text-dark mb-2">Email</h4>
                        <p class="text-muted mb-1" style="font-size: 0.95rem;">
                            Alamat email: ahmdfhri@gmail.com
                        </p>
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">
                            Melayani pada pukul 08:00 - 17.00 WIB
                        </p>
                    </div>

                    {{-- Tombol di Kanan --}}
                    <div>
                        <a href="mailto:ahmdfhri09@gmail.com"
                           class="btn btn-primary px-4 py-2 fw-bold rounded-3 text-nowrap"
                           style="background-color: #0056b3; border: none;">
                            <i class="bi bi-envelope-fill me-2"></i> Kirim Email
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
