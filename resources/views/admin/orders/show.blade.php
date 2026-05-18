<x-layout>
    <x-slot name="page_content">
        <div class="container-fluid">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0" style="color: #2b3046;">Detail Pesanan #{{ $order->invoice_number }}</h4>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-light border fw-bold px-3">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            {{-- Alert --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">

                {{-- KOLOM KIRI: Daftar Buku --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white py-3 fw-bold text-navy">
                            <i class="fas fa-shopping-bag me-2"></i> Daftar Buku Dibeli
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @foreach($order->items as $item)
                                    <li class="list-group-item p-4">
                                        <div class="row align-items-center">
                                            <div class="col-md-2 col-3 text-center">
                                                @if($item->book->image)
                                                    <img src="{{ asset('storage/' . $item->book->image) }}" class="img-fluid rounded shadow-sm" alt="Buku">
                                                @else
                                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 80px;">
                                                        <i class="fas fa-book text-muted"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-9">
                                                <h6 class="fw-bold mb-1">{{ $item->book->title }}</h6>
                                                <p class="text-muted small mb-0">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0 text-md-end fw-bold text-primary">
                                                Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    {{-- Card Info Pelanggan --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold border-bottom pb-2 mb-3">Informasi Pelanggan</h6>
                            <p class="mb-1"><strong>Nama:</strong> {{ $order->user->name }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                            <p class="mb-1"><strong>No. HP:</strong> {{ $order->user->phone ?? 'Belum diisi' }}</p>
                            <p class="mb-0"><strong>Alamat:</strong> <br> {{ $order->user->address ?? 'Belum diisi' }}</p>

                            <hr>

                            <h6 class="text-muted small">Total Pembayaran</h6>
                            <h3 class="fw-bold text-primary m-0">Rp {{ number_format($order->total_price, 0, ',', '.') }}</h3>
                        </div>
                    </div>

                    {{-- Card Update Status --}}
                    <div class="card border-0 shadow-sm rounded-4 bg-light mb-3">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3"><i class="fas fa-tasks me-2"></i> Update Status Pesanan</h6>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <select name="status" class="form-select fw-bold">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>🟡 Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>🔵 Diproses</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>🟢 Selesai</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>🔴 Dibatalkan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 fw-bold rounded-3">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>

                    {{-- Tombol Hapus Berdiri Sendiri --}}
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini selamanya?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100 fw-bold rounded-3 py-2 shadow-sm">
                            <i class="fas fa-trash-alt me-2"></i> Hapus Pesanan
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </x-slot>
</x-layout>
