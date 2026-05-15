@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-lg-10">
            <h3 class="fw-bold text-navy mb-4">Pengaturan Profil</h3>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4">

                {{-- Kolom Kiri: Avatar & Info Singkat --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
                        <div class="d-inline-flex justify-content-center align-items-center rounded-circle bg-light text-primary mx-auto mb-3"
                             style="width: 100px; height: 100px; font-size: 2.5rem;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-1">{{ $user->name }}</h5>
                        <p class="text-muted small mb-3">{{ $user->email }}</p>

                        <hr class="text-muted">

                        <div class="text-start mt-3">
                            <p class="small text-muted mb-1"><i class="bi bi-telephone text-primary me-2"></i> No. HP</p>
                            <p class="fw-bold mb-3">{{ $user->phone ?? 'Belum diisi' }}</p>

                            <p class="small text-muted mb-1"><i class="bi bi-geo-alt text-primary me-2"></i> Alamat</p>
                            <p class="fw-bold mb-0">{{ $user->address ?? 'Belum diisi' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Form Edit Profil --}}
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold text-navy mb-4 border-bottom pb-3">Edit Data Diri</h5>

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted small">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control rounded-3 py-2 @error('name') is-invalid @enderror"
                                           value="{{ old('name', $user->name) }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted small">Alamat Email</label>
                                    <input type="email" name="email" class="form-control rounded-3 py-2 @error('email') is-invalid @enderror"
                                           value="{{ old('email', $user->email) }}" required>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold text-muted small">Nomor HP (WhatsApp)</label>
                                    <input type="text" name="phone" class="form-control rounded-3 py-2 @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $user->phone) }}" placeholder="Contoh: 081234567890">
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold text-muted small">Alamat Lengkap (Untuk Pengiriman)</label>
                                    <textarea name="address" class="form-control rounded-3 py-2 @error('address') is-invalid @enderror"
                                              rows="3" placeholder="Tuliskan alamat lengkap pengiriman buku Anda...">{{ old('address', $user->address) }}</textarea>
                                    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-12 mt-4">
                                    <h5 class="fw-bold text-navy mb-3 border-bottom pb-3">Ganti Password <span class="text-muted fw-normal fs-6">(Opsional)</span></h5>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted small">Password Baru</label>
                                    <input type="password" name="password" class="form-control rounded-3 py-2 @error('password') is-invalid @enderror"
                                           placeholder="Kosongkan jika tidak ingin ganti">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted small">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control rounded-3 py-2"
                                           placeholder="Ulangi password baru">
                                </div>

                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold rounded-pill shadow-sm">
                                        <i class="bi bi-save me-2"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
