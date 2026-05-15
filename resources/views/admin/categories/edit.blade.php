<x-layout>

    <x-slot name="page_content">

        <div class="dashboard-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1" style="color: #2b3046;">
                        Edit Kategori
                    </h4>
                    <p class="text-muted mb-0">
                        Perbarui nama kategori buku yang sudah ada
                    </p>
                </div>

                <a href="{{ route('admin.categories.index') }}"
                   class="btn btn-light border fw-semibold px-4 py-2 rounded-3 shadow-sm">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>

            {{-- Card Form --}}
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">

                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Input Nama Kategori --}}
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold text-dark">
                                        Nama Kategori <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                           id="name"
                                           name="name"
                                           class="form-control py-2 rounded-3 @error('name') is-invalid @enderror"
                                           value="{{ old('name', $category->name) }}"
                                           placeholder="Contoh: Teknologi, Novel, Bisnis..."
                                           required>

                                    {{-- Pesan Error Validasi --}}
                                    @error('name')
                                        <div class="invalid-feedback fw-medium">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Tombol Submit --}}
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary fw-semibold px-4 py-2 rounded-3 shadow-sm">
                                        <i class="bi bi-save me-2"></i>
                                        Simpan Perubahan
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </x-slot>

</x-layout>
