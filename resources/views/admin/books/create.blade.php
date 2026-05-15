<x-layout>

    <x-slot name="page_content">

        <div class="dashboard-body">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1" style="color: #2b3046;">
                        Tambah Buku
                    </h4>
                    <p class="text-muted mb-0">
                        Tambahkan data buku baru ke dalam sistem.
                    </p>
                </div>

                <a href="{{ route('admin.books.index') }}"
                   class="btn btn-light border fw-semibold px-4 py-2 rounded-3">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>

            <!-- CARD -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-body p-4 p-lg-5">

                    {{-- ALERT ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 border-0 mb-4">
                            <div class="fw-bold mb-2">
                                Terjadi kesalahan:
                            </div>

                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.books.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">

                            <!-- LEFT -->
                            <div class="col-lg-8">

                                <!-- JUDUL -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Judul Buku
                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light"
                                           placeholder="Masukkan judul buku"
                                           value="{{ old('title') }}"
                                           required>
                                </div>

                                <!-- PENULIS -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Penulis
                                    </label>

                                    <input type="text"
                                           name="author"
                                           class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light"
                                           placeholder="Masukkan nama penulis"
                                           value="{{ old('author') }}"
                                           required>
                                </div>

                                <!-- DESKRIPSI -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Deskripsi Buku
                                    </label>

                                    <textarea name="description"
                                              rows="8"
                                              class="form-control rounded-3 shadow-sm border-0 bg-light"
                                              placeholder="Masukkan deskripsi buku"
                                              required>{{ old('description') }}</textarea>
                                </div>

                            </div>

                            <!-- RIGHT -->
                            <div class="col-lg-4">

                                <!-- KATEGORI -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Kategori
                                    </label>

                                    <select name="category_id"
                                            class="form-select form-select-lg rounded-3 shadow-sm border-0 bg-light"
                                            required>

                                        <option value="">
                                            -- Pilih Kategori --
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <!-- HARGA -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Harga
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light shadow-sm rounded-start-3">
                                            Rp
                                        </span>

                                        <input type="number"
                                               name="price"
                                               class="form-control form-control-lg border-0 bg-light shadow-sm rounded-end-3"
                                               placeholder="Masukkan harga"
                                               value="{{ old('price') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- STOK -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Stok Buku
                                    </label>

                                    <input type="number"
                                           name="stock"
                                           class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light"
                                           placeholder="Masukkan stok"
                                           value="{{ old('stock') }}"
                                           required>
                                </div>

                                <!-- FOTO -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark">
                                        Gambar Buku
                                    </label>

                                    <input type="file"
                                           name="image"
                                           class="form-control form-control-lg rounded-3 shadow-sm border-0 bg-light"
                                           accept="image/*"
                                           required>
                                </div>

                                <!-- PREVIEW -->
                                <div class="mb-4">

                                    <div class="border rounded-4 bg-light d-flex align-items-center justify-content-center overflow-hidden"
                                         style="height: 320px;">

                                        <img id="preview-image"
                                             src="https://placehold.co/300x400/e9ecef/6c757d?text=Preview+Gambar"
                                             class="img-fluid h-100 object-fit-cover"
                                             alt="Preview">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end mt-4">

                            <button type="submit"
                                    class="btn btn-primary px-5 py-3 fw-bold rounded-3 shadow-sm">

                                <i class="fas fa-save me-2"></i>
                                Simpan Buku

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </x-slot>

</x-layout>

{{-- PREVIEW IMAGE --}}
<script>
    const imageInput = document.querySelector('input[name="image"]');
    const previewImage = document.getElementById('preview-image');

    imageInput.addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){
            previewImage.src = URL.createObjectURL(file);
        }

    });
</script>
