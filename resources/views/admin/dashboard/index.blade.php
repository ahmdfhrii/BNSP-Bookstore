<x-layout>
    <x-slot name='page_content'>

        <style>
            .stat-card {
                background: white;
                border-radius: 12px;
                border: 1px solid #eef2f7;
                box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            }
            .icon-box {
                width: 45px;
                height: 45px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #e2e8f0;
                color: #475569;
                font-size: 1.2rem;
            }
        </style>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stat-card p-3 d-flex align-items-center gap-3 h-100">
                    <div class="icon-box"><i class="fas fa-user-friends"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1 text-primary-dark" style="color: #2b3046;">Total Pengguna</h6>
                        <h5 class="fw-bold mb-0 text-secondary">{{ $totalUser }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card p-3 d-flex align-items-center gap-3 h-100">
                    <div class="icon-box"><i class="fas fa-book"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #2b3046;">Total Buku</h6>
                        <h5 class="fw-bold mb-0 text-secondary">{{ $totalBook }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card p-3 d-flex align-items-center gap-3 h-100">
                    <div class="icon-box"><i class="fas fa-clipboard-list"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #2b3046;">Total Kategori Buku</h6>
                        <h5 class="fw-bold mb-0 text-secondary">{{ $totalCategory }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card p-3 d-flex align-items-center gap-3 h-100">
                    <div class="icon-box"><i class="fas fa-envelope-open-text"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #2b3046;">Total Pesanan</h6>
                        <h5 class="fw-bold mb-0 text-secondary">{{ $totalOrder }}</h5>
                    </div>
                </div>
            </div>
        </div>

<div class="row g-4">

            <div class="col-lg-8">
                <div class="stat-card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h6 class="fw-bold m-0" style="color: #2b3046;">Statistik Pesanan</h6>

                        <form action="{{ route('admin.dashboard') }}" method="GET" class="d-flex gap-2">
                            <select name="year" class="form-select bg-light border-0 fw-bold text-secondary" style="width: 100px;" onchange="this.form.submit()">
                                <option value="2026" {{ request('year', date('Y')) == '2026' ? 'selected' : '' }}>2026</option>
                                <option value="2025" {{ request('year', date('Y')) == '2025' ? 'selected' : '' }}>2025</option>
                                <option value="2024" {{ request('year', date('Y')) == '2024' ? 'selected' : '' }}>2024</option>
                            </select>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="border-radius: 8px;">Filter</button>
                        </form>
                    </div>

                    <div style="height: 350px;">
                        <canvas id="orderChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="stat-card p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-bold m-0" style="color: #2b3046;">Pesanan Terbaru</h6>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-light fw-bold text-primary" style="border-radius: 8px;">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="d-flex flex-column gap-3 flex-grow-1 overflow-auto">
                        @forelse($recentOrders as $order)
                            <div class="d-flex align-items-center p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="icon-box me-3 text-white
                                    {{ $order->status == 'completed' ? 'bg-success' : ($order->status == 'pending' ? 'bg-warning' : ($order->status == 'processing' ? 'bg-primary' : 'bg-danger')) }}"
                                    style="width: 40px; height: 40px; font-size: 1rem;">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="fw-bold text-navy text-decoration-none d-block mb-1" style="font-size: 0.9rem;">
                                        {{ $order->invoice_number }}
                                    </a>
                                    <small class="text-muted d-block" style="font-size: 0.8rem;">{{ $order->user->name }}</small>
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold text-primary d-block" style="font-size: 0.9rem;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                    <small class="text-muted" style="font-size: 0.75rem;">{{ $order->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5 text-muted my-auto">
                                <i class="fas fa-inbox fs-2 mb-2 opacity-50"></i>
                                <p class="mb-0 small fw-bold">Belum ada pesanan masuk</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('orderChart').getContext('2d');
            let gradientFill = ctx.createLinearGradient(0, 0, 0, 350);
            gradientFill.addColorStop(0, 'rgba(59, 130, 246, 0.4)');
            gradientFill.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

            new Chart(ctx, {
                type: 'line', // Ubah dari 'bar' menjadi 'line'
                data: {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'],
                    datasets: [
                        {
                            label: 'Jumlah Pesanan',
                            data: {!! json_encode($monthlyOrders) !!},
                            borderColor: '#3b82f6',
                            borderWidth: 3,
                            backgroundColor: gradientFill,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#3b82f6',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#2b3046',
                            titleFont: { size: 13, family: 'system-ui' },
                            bodyFont: { size: 14, weight: 'bold', family: 'system-ui' },
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: '#a0aec0',
                                font: { size: 11, weight: 'bold' }
                            },
                            border: { display: false },
                            grid: {
                                color: '#f1f5f9',
                                drawBorder: false
                            }
                        },
                        x: {
                            ticks: {
                                color: '#a0aec0',
                                font: { size: 11, weight: 'bold' }
                            },
                            border: { display: false },
                            grid: { display: false }
                        }
                    }
                }
            });
        </script>
    </x-slot>
</x-layout>
