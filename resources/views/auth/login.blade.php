@extends('layouts.app')

@section('title', 'Login - FahriBooks')

@section('page-header')

<div class="bg-gray-custom py-4 border-bottom border-secondary border-opacity-10 text-center">

    <h3 class="fw-bold text-navy mb-1">
        Login ke Akun FahriBooks
    </h3>

    <p class="text-muted mb-0 small">
        Temukan buku favoritmu bersama FahriBooks
    </p>

</div>

@endsection

@section('content')

<div class="card login-card border-0 my-5">

    <div class="card-body p-4 p-lg-5">

        <div class="text-center mb-4">

            <img src="{{ asset('storage/images/fahribooks.png') }}"
                 alt="Logo FahriBooks"
                 height="70"
                 class="mb-3">

            <h4 class="fw-bold mb-1">
                Selamat Datang
            </h4>

            <p class="text-muted small">
                Silahkan login ke akun FahriBooks kamu
            </p>

        </div>

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            @if(session('error'))

                <div class="alert alert-danger border-0 shadow-sm small rounded-3">

                    {{ session('error') }}

                </div>

            @endif

            <!-- EMAIL -->
            <div class="mb-3">

                <label class="form-label fw-semibold text-navy">
                    Email
                </label>

                <div class="input-group">

                    <span class="input-group-text input-group-text-custom">
                        <i class="bi bi-envelope-fill text-muted"></i>
                    </span>

                    <input type="email"
                           name="email"
                           class="form-control form-control-custom"
                           placeholder="Masukkan email"
                           required>

                </div>

            </div>

            <!-- PASSWORD -->
            <div class="mb-4">

                <label class="form-label fw-semibold text-navy">
                    Password
                </label>

                <div class="input-group">

                    <span class="input-group-text input-group-text-custom">
                        <i class="bi bi-lock-fill text-muted"></i>
                    </span>

                    <input type="password"
                           name="password"
                           id="passwordInput"
                           class="form-control form-control-custom"
                           placeholder="Masukkan password"
                           required>

                    <button type="button"
                            class="input-group-text input-group-text-custom border-0"
                            onclick="togglePassword()">

                        <i class="bi bi-eye-fill text-muted"
                           id="toggleIcon"></i>

                    </button>

                </div>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="btn btn-yellow w-100 py-3 fw-semibold">

                Login Sekarang

            </button>

            <!-- REGISTER -->
            <div class="text-center mt-4">

                <small class="text-muted">

                    Belum punya akun?

                    <a href="{{ route('register') }}"
                       class="fw-semibold text-yellow">

                        Daftar Sekarang

                    </a>

                </small>

            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')

<script>

    function togglePassword(){

        const passwordInput =
        document.getElementById('passwordInput');

        const toggleIcon =
        document.getElementById('toggleIcon');

        if(passwordInput.type === 'password'){

            passwordInput.type = 'text';

            toggleIcon.classList.remove('bi-eye-fill');

            toggleIcon.classList.add('bi-eye-slash-fill');

        }else{

            passwordInput.type = 'password';

            toggleIcon.classList.remove('bi-eye-slash-fill');

            toggleIcon.classList.add('bi-eye-fill');

        }
    }

</script>

@endpush
