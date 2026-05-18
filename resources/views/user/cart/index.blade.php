@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-5">
    <div class="d-flex align-items-center mb-4">
        <h3 class="fw-bold text-navy m-0">Keranjang Belanja</h3>
        <span class="badge bg-secondary ms-3 rounded-pill">{{ $carts->count() }} Produk</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3 border-bottom border-light">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                            <label class="form-check-label fw-bold text-muted ms-2" for="select-all">
                                Pilih Semua Produk
                            </label>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @forelse($carts as $cart)
                            <div class="p-4 border-bottom border-light cart-item">
                                <div class="row align-items-center">

                                    <div class="col-auto">
                                        <input class="form-check-input item-checkbox" type="checkbox" name="selected_items[]"
                                               value="{{ $cart->id }}"
                                               data-price="{{ $cart->book->price }}"
                                               data-qty="{{ $cart->quantity }}"
                                               onclick="calculateTotal()">
                                    </div>

                                    <div class="col-md-2 col-3 text-center">
                                        @if($cart->book->image)
                                            <img src="{{ asset('storage/' . $cart->book->image) }}" alt="{{ $cart->book->title }}" class="img-fluid rounded-3 shadow-sm">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="height: 100px;">
                                                <i class="bi bi-book fs-1 text-muted opacity-25"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 col-7">
                                        <h6 class="fw-bold mb-1 text-navy">{{ $cart->book->title }}</h6>
                                        <p class="text-muted small mb-2">Penulis: {{ $cart->book->author }}</p>
                                        <div class="d-md-none fw-bold text-primary">
                                            Rp {{ number_format($cart->book->price, 0, ',', '.') }}
                                        </div>
                                    </div>

                                    <div class="col-md-5 mt-3 mt-md-0 text-md-end">
                                        <div class="d-none d-md-block fw-bold text-navy mb-2">
                                            Rp {{ number_format($cart->book->price, 0, ',', '.') }}
                                        </div>

                                        <div class="d-flex align-items-center justify-content-md-end gap-2">
                                            <div class="input-group input-group-sm" style="width: 110px;">
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQty({{ $cart->id }}, -1, {{ $cart->book->stock }})">-</button>
                                                <input type="text" id="qty-input-{{ $cart->id }}" class="form-control text-center fw-bold bg-white" value="{{ $cart->quantity }}" readonly>
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQty({{ $cart->id }}, 1, {{ $cart->book->stock }})">+</button>
                                            </div>

                                            <button type="button" class="btn btn-outline-danger btn-sm border-0 ms-2" onclick="deleteCartItem({{ $cart->id }})">
                                                <i class="bi bi-trash fs-5"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" alt="Empty Cart" style="width: 150px;" class="mb-3 opacity-50">
                                <h5 class="fw-bold text-muted">Keranjang masih kosong</h5>
                                <p class="text-muted small">Yuk, cari buku favoritmu di katalog kami!</p>
                                <a href="{{ route('katalog') }}" class="btn btn-primary px-4 mt-2 rounded-pill fw-bold">Lihat Katalog</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px; z-index: 1;">
                    <h5 class="fw-bold text-navy mb-4">Ringkasan Belanja</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Barang</span>
                        <span id="total-qty" class="fw-bold">0</span>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="text-muted">Total Harga</span>
                        <h4 id="total-price" class="fw-bold text-primary m-0">Rp 0</h4>
                    </div>

                    <button type="submit" id="btn-checkout" class="btn btn-primary w-100 py-3 rounded-3 fw-bold shadow-sm d-flex justify-content-between align-items-center" disabled>
                        <span>Beli Sekarang</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>

                    <p class="text-center text-muted small mt-3 mb-0">
                        <i class="bi bi-shield-check me-1"></i> Transaksi Aman & Terpercaya
                    </p>
                </div>
            </div>
        </div>
    </form>

    <form id="delete-form" action="" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
    // --- 1. Fungsi Pilih Semua ---
    function toggleSelectAll(source) {
        let checkboxes = document.getElementsByClassName('item-checkbox');
        for(let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
        calculateTotal();
    }

    // --- 2. Fungsi Hitung Total ---
    function calculateTotal() {
        const items = document.querySelectorAll('.item-checkbox:checked');
        let totalPrice = 0;
        let totalQty = 0;

        items.forEach(item => {
            const price = parseInt(item.getAttribute('data-price'));
            const cartId = item.getAttribute('value');

            // Ambil quantity terbaru dari input text
            const qty = parseInt(document.getElementById(`qty-input-${cartId}`).value);

            totalPrice += (price * qty);
            totalQty += qty;
        });

        document.getElementById('total-qty').innerText = totalQty;
        document.getElementById('total-price').innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');

        const btnCheckout = document.getElementById('btn-checkout');
        btnCheckout.disabled = (items.length === 0);
    }

    // --- 3. Fungsi Tambah/Kurang Qty via AJAX ---
// Tambahkan parameter maxStock di sini
    function updateQty(cartId, change, maxStock) {
        const input = document.getElementById(`qty-input-${cartId}`);
        let newQty = parseInt(input.value) + change;

        // Validasi Batas Bawah (Minimal 1)
        if (newQty < 1) return;

        // Validasi Batas Atas (Maksimal sesuai stok database)
        if (newQty > maxStock) {
            alert(`Maaf, Anda tidak bisa menambahkan lebih dari ${maxStock} buku (Stok habis).`);
            return;
        }

        // Ubah tampilan angka langsung
        input.value = newQty;

        const checkbox = document.querySelector(`.item-checkbox[value="${cartId}"]`);
        if (checkbox) checkbox.setAttribute('data-qty', newQty);

        // Hitung ulang total di sebelah kanan
        calculateTotal();

        // Kirim perubahan ke database
        fetch(`/keranjang/${cartId}`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ quantity: newQty })
        }).catch(error => {
            console.error('Terjadi kesalahan:', error);
            input.value = newQty - change;
            calculateTotal();
        });
    }

    // --- 4. Fungsi Hapus Item ---
    function deleteCartItem(cartId) {
        if(confirm('Yakin ingin menghapus buku ini dari keranjang?')) {
            const form = document.getElementById('delete-form');
            form.action = `/keranjang/${cartId}`;
            form.submit();
        }
    }
</script>
@endsection
