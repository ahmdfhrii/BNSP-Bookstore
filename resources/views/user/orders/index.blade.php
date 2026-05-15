@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <h3 class="fw-bold text-navy mb-1">
                Daftar Pesanan Saya
            </h3>

            <p class="text-muted mb-0">
                Pantau status pemesanan buku Anda dengan mudah
            </p>
        </div>

    </div>

    {{-- Tab Menu --}}
    <div class="d-flex gap-3 flex-wrap mb-5">

        <a href="{{ route('orders.index') }}"
           class="text-decoration-none">

            <div class="
                px-4 py-3 rounded-4 fw-semibold shadow-sm
                {{ request()->is('pesanan')
                    ? 'bg-primary text-white'
                    : 'bg-white text-dark border' }}
                "
                style="
                    min-width: 220px;
                    transition: .3s;
                ">

                <div class="d-flex align-items-center gap-3">

                    <div class="
                        d-flex justify-content-center align-items-center
                        rounded-circle
                        {{ request()->is('pesanan')
                            ? 'bg-white text-primary'
                            : 'bg-light text-primary' }}
                        "
                        style="width: 45px; height: 45px;">

                        <i class="bi bi-box-seam fs-5"></i>

                    </div>

                    <div>

                        <div class="fw-bold">
                            Sedang Berjalan
                        </div>

                        <small class="
                            {{ request()->is('pesanan')
                                ? 'text-white-50'
                                : 'text-muted' }}
                            ">
                            Pesanan aktif Anda
                        </small>

                    </div>

                </div>

            </div>

        </a>

        <a href="{{ route('orders.history') }}"
           class="text-decoration-none">

            <div class="
                px-4 py-3 rounded-4 fw-semibold shadow-sm
                {{ request()->is('pesanan/riwayat')
                    ? 'bg-success text-white'
                    : 'bg-white text-dark border' }}
                "
                style="
                    min-width: 220px;
                    transition: .3s;
                ">

                <div class="d-flex align-items-center gap-3">

                    <div class="
                        d-flex justify-content-center align-items-center
                        rounded-circle
                        {{ request()->is('pesanan/riwayat')
                            ? 'bg-white text-success'
                            : 'bg-light text-success' }}
                        "
                        style="width: 45px; height: 45px;">

                        <i class="bi bi-clock-history fs-5"></i>

                    </div>

                    <div>

                        <div class="fw-bold">
                            Riwayat Pesanan
                        </div>

                        <small class="
                            {{ request()->is('pesanan/riwayat')
                                ? 'text-white-50'
                                : 'text-muted' }}
                            ">
                            Semua transaksi selesai
                        </small>

                    </div>

                </div>

            </div>

        </a>

    </div>

    {{-- List Pesanan --}}
    @forelse($orders as $order)

        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">

            {{-- Header Card --}}
            <div class="card-header bg-white border-0 py-3 px-4">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                    <div>

                        <small class="text-muted d-block">
                            No. Invoice
                        </small>

                        <h6 class="fw-bold mb-0">
                            {{ $order->invoice_number }}
                        </h6>

                    </div>

                    <span class="badge
                        {{ $order->status == 'pending'
                            ? 'bg-warning text-dark'
                            : 'bg-success' }}
                        px-4 py-2 rounded-pill fw-semibold">

                        <i class="bi
                            {{ $order->status == 'pending'
                                ? 'bi-hourglass-split'
                                : 'bi-check-circle-fill' }}
                            me-1"></i>

                        {{ ucfirst($order->status) }}

                    </span>

                </div>

            </div>

            {{-- Body --}}
            <div class="card-body px-4 py-4">

                <div class="row">

                    {{-- Buku --}}
                    <div class="col-lg-8">

                        @foreach($order->items as $item)

                            <div class="d-flex align-items-center mb-3">

                                <div class="
                                    d-flex justify-content-center align-items-center
                                    rounded-3 bg-light me-3
                                    "
                                    style="width: 55px; height: 55px;">

                                    <i class="bi bi-book text-primary fs-4"></i>

                                </div>

                                <div>

                                    <h6 class="fw-bold mb-1">
                                        {{ $item->book->title }}
                                    </h6>

                                    <small class="text-muted">
                                        Jumlah: {{ $item->quantity }} buku
                                    </small>

                                </div>

                            </div>

                        @endforeach

                    </div>

                    {{-- Total --}}
                    <div class="col-lg-4 mt-4 mt-lg-0">

                        <div class="bg-light rounded-4 p-4 h-100">

                            <small class="text-muted d-block mb-1">
                                Total Pembayaran
                            </small>

                            <h4 class="fw-bold text-primary mb-3">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </h4>

                            <div class="d-flex align-items-center text-muted small">

                                <i class="bi bi-calendar-event me-2"></i>

                                {{ $order->created_at->format('d M Y, H:i') }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @empty

        {{-- Empty --}}
        <div class="text-center py-5">

            <div class="
                d-inline-flex
                justify-content-center
                align-items-center
                rounded-circle
                bg-light
                mb-4
                "
                style="width: 120px; height: 120px;">

                <i class="bi bi-bag-x text-secondary"
                   style="font-size: 3rem;"></i>

            </div>

            <h4 class="fw-bold text-muted mb-2">
                Belum Ada Pesanan
            </h4>

            <p class="text-muted mb-4">
                Anda belum melakukan pemesanan buku.
            </p>

            <a href="/katalog"
               class="btn btn-primary px-4 py-3 rounded-pill fw-semibold shadow-sm">

                <i class="bi bi-book me-2"></i>
                Jelajahi Buku

            </a>

        </div>

    @endforelse

</div>
@endsection
