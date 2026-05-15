<x-layout>

    <x-slot name="page_content">

        <div class="dashboard-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1" style="color: #2b3046;">
                        Detail Buku
                    </h4>
                    <p class="text-muted mb-0">
                        Informasi lengkap data buku
                    </p>
                </div>

                <a href="{{ route('admin.books.index') }}"
                   class="btn btn-light border fw-semibold px-4 py-2 rounded-3">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>

            <!-- Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="row g-0">

                    <!-- Gambar Buku -->
                    <div class="col-lg-4">

                        <div class="h-100 d-flex align-items-center justify-content-center bg-light p-4">

                            @if($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}"
                                     alt="{{ $book->title }}"
                                     class="img-fluid rounded-4 shadow-sm"
                                     style="max-height: 500px; object-fit: cover;">
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-book fa-4x mb-3 opacity-25"></i>
                                    <p class="mb-0">Gambar tidak tersedia</p>
                                </div>
                            @endif

                        </div>

                    </div>

                    <!-- Detail -->
                    <div class="col-lg-8">

                        <div class="card-body p-5">

                            <!-- Judul -->
                            <div class="mb-4">

                                <span class="badge rounded-pill px-3 py-2 mb-3"
                                      style="background: #eef2ff; color: #4338ca;">

                                    {{ $book->category->name ?? 'Kategori Tidak Ada' }}

                                </span>

                                <h2 class="fw-bold mb-2"
                                    style="color: #1e293b; line-height: 1.4;">

                                    {{ $book->title }}

                                </h2>

                                <p class="text-muted mb-0">
                                    Oleh
                                    <span class="fw-semibold text-dark">
                                        {{ $book->author }}
                                    </span>
                                </p>

                            </div>

                            <!-- Informasi -->
                            <div class="row g-4 mb-4">

                                <div class="col-md-6">
                                    <div class="border rounded-4 p-4 h-100">

                                        <small class="text-muted d-block mb-2">
                                            Harga Buku
                                        </small>

                                        <h5 class="fw-bold text-success mb-0">
                                            Rp {{ number_format($book->price, 0, ',', '.') }}
                                        </h5>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded-4 p-4 h-100">

                                        <small class="text-muted d-block mb-2">
                                            Stok Buku
                                        </small>

                                        <h5 class="fw-bold mb-0"
                                            style="color: #0f172a;">

                                            {{ $book->stock }} Buku

                                        </h5>

                                    </div>
                                </div>

                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-5">

                                <h5 class="fw-bold mb-3"
                                    style="color: #1e293b;">

                                    Deskripsi Buku

                                </h5>

                                <div class="border rounded-4 p-4 bg-light">

                                    <p class="text-secondary mb-0"
                                       style="line-height: 1.9; text-align: justify;">

                                        {{ $book->description }}

                                    </p>

                                </div>

                            </div>

                            <!-- Informasi Tambahan -->
                            <div class="row g-4 mb-5">

                                <div class="col-md-6">

                                    <div class="border rounded-4 p-4">

                                        <small class="text-muted d-block mb-2">
                                            Dibuat Pada
                                        </small>

                                        <span class="fw-semibold text-dark">
                                            {{ $book->created_at->format('d F Y - H:i') }}
                                        </span>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="border rounded-4 p-4">

                                        <small class="text-muted d-block mb-2">
                                            Terakhir Diupdate
                                        </small>

                                        <span class="fw-semibold text-dark">
                                            {{ $book->updated_at->format('d F Y - H:i') }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                            <!-- Action -->
                            <div class="d-flex gap-3 flex-wrap">

                                <a href="{{ route('admin.books.edit', $book->id) }}"
                                   class="btn btn-warning px-4 py-2 fw-semibold rounded-3">

                                    <i class="fas fa-edit me-2"></i>
                                    Edit Buku

                                </a>

                                <form action="{{ route('admin.books.destroy', $book->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger px-4 py-2 fw-semibold rounded-3">

                                        <i class="fas fa-trash-alt me-2"></i>
                                        Hapus Buku

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </x-slot>

</x-layout>
