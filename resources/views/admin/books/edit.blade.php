<x-layout>

    <x-slot name="page_content">

        <div class="dashboard-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="fw-bold mb-1" style="color: #2b3046;">
                        Edit Buku
                    </h4>

                    <p class="text-muted mb-0">
                        Perbarui informasi data buku
                    </p>
                </div>

                <a href="{{ route('admin.books.index') }}"
                   class="btn btn-light border fw-semibold px-4 py-2 rounded-3">

                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali

                </a>

            </div>

            <!-- Card -->
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-lg-5">

                    <form action="{{ route('admin.books.update', $book->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            <!-- LEFT -->
                            <div class="col-lg-8">

                                <!-- Kategori -->
                                <div class="mb-4">

                                    <label class="form-label fw-semibold text-dark">
                                        Kategori Buku
                                    </label>

                                    <select name="category_id"
                                            class="form-select rounded-3 py-2 @error('category_id') is-invalid @enderror">

                                        <option value="">
                                            -- Pilih Kategori --
                                        </option>

                                        @foreach($categories as $category)

                                            <option value="{{ $category->id }}"
                                                {{ $book->category_id == $category->id ? 'selected' : '' }}>

                                                {{ $category->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Judul -->
                                <div class="mb-4">

                                    <label class="form-label fw-semibold text-dark">
                                        Judul Buku
                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control rounded-3 py-2 @error('title') is-invalid @enderror"
                                           value="{{ old('title', $book->title) }}"
                                           placeholder="Masukkan judul buku">

                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Author -->
                                <div class="mb-4">

                                    <label class="form-label fw-semibold text-dark">
                                        Penulis
                                    </label>

                                    <input type="text"
                                           name="author"
                                           class="form-control rounded-3 py-2 @error('author') is-invalid @enderror"
                                           value="{{ old('author', $book->author) }}"
                                           placeholder="Masukkan nama penulis">

                                    @error('author')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-4">

                                    <label class="form-label fw-semibold text-dark">
                                        Deskripsi Buku
                                    </label>

                                    <textarea name="description"
                                              rows="7"
                                              class="form-control rounded-3 @error('description') is-invalid @enderror"
                                              placeholder="Masukkan deskripsi buku">{{ old('description', $book->description) }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row">

                                    <!-- Harga -->
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label fw-semibold text-dark">
                                            Harga Buku
                                        </label>

                                        <input type="number"
                                               name="price"
                                               class="form-control rounded-3 py-2 @error('price') is-invalid @enderror"
                                               value="{{ old('price', $book->price) }}"
                                               placeholder="Masukkan harga buku">

                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                    <!-- Stock -->
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label fw-semibold text-dark">
                                            Stock Buku
                                        </label>

                                        <input type="number"
                                               name="stock"
                                               class="form-control rounded-3 py-2 @error('stock') is-invalid @enderror"
                                               value="{{ old('stock', $book->stock) }}"
                                               placeholder="Masukkan stock buku">

                                        @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <!-- RIGHT -->
                            <div class="col-lg-4">

                                <div class="border rounded-4 p-4 bg-light">

                                    <label class="form-label fw-semibold text-dark mb-3">
                                        Cover Buku
                                    </label>

                                    <!-- Preview -->
                                    <div class="text-center mb-4">

                                        @if($book->image)

                                            <img src="{{ asset('storage/' . $book->image) }}"
                                                 alt="{{ $book->title }}"
                                                 class="img-fluid rounded-4 shadow-sm border"
                                                 style="max-height: 350px; object-fit: cover;">

                                        @else

                                            <div class="py-5 text-muted">
                                                <i class="fas fa-image fa-4x mb-3 opacity-25"></i>
                                                <p class="mb-0">
                                                    Belum ada gambar
                                                </p>
                                            </div>

                                        @endif

                                    </div>

                                    <!-- Upload -->
                                    <input type="file"
                                           name="image"
                                           class="form-control rounded-3 @error('image') is-invalid @enderror">

                                    <small class="text-muted d-block mt-2">
                                        Format: JPG, JPEG, PNG
                                    </small>

                                    @error('image')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-3 mt-5">

                            <a href="{{ route('admin.books.index') }}"
                               class="btn btn-light border px-4 py-2 fw-semibold rounded-3">

                                Batal

                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-5 py-2 fw-semibold rounded-3 shadow-sm">

                                <i class="fas fa-save me-2"></i>
                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </x-slot>

</x-layout>
