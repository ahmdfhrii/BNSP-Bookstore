@extends('layouts.app')

@section('title', 'Registrasi - FahriBooks')

@section('page-header')
<div class="bg-gray-custom py-3 border-bottom border-secondary border-opacity-25 shadow-sm text-center">
    <h3 class="fw-bold text-navy mb-0">Registrasi Akun FahriBooks</h3>
</div>
@endsection

@section('content')
<div class="card register-card shadow-sm my-5">
    <div class="card-body p-5">

        <form action="#" method="POST">
            @csrf

            <div class="row g-4">
                <div class="col-md-6 d-flex flex-column gap-4">
                    <div>
                        <label class="form-label text-navy fw-bold">Nama Lengkap *</label>
                        <input type="text" name="name" class="form-control form-control-custom bg-light border-0 py-2" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div>
                        <label class="form-label text-navy fw-bold">Username *</label>
                        <input type="text" name="username" class="form-control form-control-custom bg-light border-0 py-2" placeholder="Masukkan username" required>
                    </div>

                    <div>
                        <label class="form-label text-navy fw-bold">Email *</label>
                        <input type="email" name="email" class="form-control form-control-custom bg-light border-0 py-2" placeholder="Masukkan email" required>
                    </div>

                    <div>
                        <label class="form-label text-navy fw-bold">Nomor Telepon *</label>
                        <input type="text" name="phone" class="form-control form-control-custom bg-light border-0 py-2" placeholder="Masukkan nomor telepon" required>
                    </div>

                    <div class="flex-grow-1">
                        <label class="form-label text-navy fw-bold">Alamat *</label>
                        <textarea name="address" class="form-control form-control-custom bg-light border-0 py-2" rows="4" placeholder="Masukkan Alamat Anda" required></textarea>
                    </div>
                </div>

                <div class="col-md-6 d-flex flex-column gap-4">
                    <div>
                        <label class="form-label text-navy fw-bold">Tanggal Lahir</label>
                        <input type="date" name="dob" class="form-control form-control-custom bg-white border py-2 shadow-sm" style="border-color: #aeb0c2 !important;">
                    </div>

                    <div>
                        <label class="form-label text-navy fw-bold">Jenis Kelamin *</label>
                        <div class="d-flex gap-4 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderLaki" value="Laki-Laki" required>
                                <label class="form-check-label text-navy fw-medium" for="genderLaki">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderPerempuan" value="Perempuan" required>
                                <label class="form-check-label text-navy fw-medium" for="genderPerempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="form-label text-navy fw-bold">Password *</label>
                        <input type="password" name="password" class="form-control form-control-custom bg-light border-0 py-2" placeholder="Masukkan password" required>
                    </div>

                    <div>
                        <label class="form-label text-navy fw-bold">Konfirmasi Password *</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-custom bg-light border-0 py-2" placeholder="Masukkan konfirmasi password" required>
                    </div>

                    <div class="mt-auto d-flex justify-content-end pt-5">
                        {{-- Class bg-navy telah diubah menjadi btn-dark --}}
                        <button type="submit" class="btn btn-dark px-5 py-2 fs-5 fw-semibold shadow-sm">Kirim</button>
                    </div>
                    <div class="text-center mt-4">
                        <small class="text-muted">

                            Sudah punya akun?

                            <a href="{{ route('login') }}"
                            class="fw-semibold text-yellow">

                                Login Sekarang

                            </a>

                        </small>

                    </div>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection
