<x-layout>
    <x-slot name="page_content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold" style="color: #2b3046;">Tambah Pengguna Baru</h4>
                <a href="{{ route('admin.users.index') }}" class="btn btn-light border fw-bold px-3">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Username</label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                           placeholder="Tanpa spasi, cth: ahmadfachri" value="{{ old('username') }}" required>
                                    @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Alamat Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           placeholder="nama@email.com" value="{{ old('email') }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Nomor Handphone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                           placeholder="Contoh: 08123456789" value="{{ old('phone') }}">
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Tanggal Lahir</label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                           value="{{ old('dob') }}">
                                    @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Jenis Kelamin</label>
                                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold text-secondary">Alamat Lengkap</label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                              rows="3" placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-12 mb-3 mt-2">
                                    <h6 class="fw-bold border-bottom pb-2">Keamanan Akun</h6>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Minimal 8 karakter" required>
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold text-secondary">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="Ulangi password" required>
                                </div>
                            </div>

                            <hr class="text-light">

                            <div class="d-flex justify-content-end gap-2 mt-2">
                                <button type="reset" class="btn btn-light fw-bold px-4">Reset</button>
                                <button type="submit" class="btn btn-primary fw-bold px-4" style="background-color: #3b82f6; border: none; border-radius: 8px;">
                                    <i class="fas fa-save me-1"></i> Simpan Pengguna
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                        <h6 class="fw-bold"><i class="fas fa-info-circle me-2 text-primary"></i> Informasi Pengisian</h6>
                        <ul class="small text-muted mb-0 ps-3 mt-2" style="line-height: 1.8;">
                            <li>Pastikan <strong>Username</strong> unik dan belum dipakai.</li>
                            <li>Role akan secara otomatis ditetapkan sebagai <strong>Customer</strong>.</li>
                            <li>Kolom Tanggal Lahir, Jenis Kelamin, Nomor HP, dan Alamat bersifat opsional (bisa diisi nanti oleh user).</li>
                            <li>Password wajib minimal 8 karakter.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </x-slot>
</x-layout>
