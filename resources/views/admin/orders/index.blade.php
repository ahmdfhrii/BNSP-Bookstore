<x-layout>
    <x-slot name="page_content">
        <div class="container-fluid">
            <h4 class="fw-bold mb-4" style="color: #2b3046;">Manajemen Pesanan</h4>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light text-secondary">
                                <tr>
                                    <th>No. Invoice</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td class="fw-bold text-navy">{{ $order->invoice_number }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $order->user->name }}</div>
                                            <small class="text-muted">{{ $order->user->phone ?? '-' }}</small>
                                        </td>
                                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                        <td class="fw-bold text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td>
                                            @if($order->status == 'pending')
                                                <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                            @elseif($order->status == 'processing')
                                                <span class="badge bg-primary px-3 py-2">Diproses</span>
                                            @elseif($order->status == 'completed')
                                                <span class="badge bg-success px-3 py-2">Selesai</span>
                                            @else
                                                <span class="badge bg-danger px-3 py-2">Dibatalkan</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-light border fw-bold text-primary">
                                                <i class="fas fa-eye me-1"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">Belum ada pesanan yang masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
