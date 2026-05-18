<nav class="navbar navbar-expand-lg py-3 shadow-sm sticky-top">
    <div class="container-fluid px-lg-5 px-3 align-items-center">

        <a class="navbar-brand py-0" href="/">
            <img src="{{ asset('storage/images/fahribooks.png') }}"
                 alt="Logo FahriBooks"
                 height="62">
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list text-white fs-2"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mx-auto gap-2 gap-lg-4 mt-3 mt-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active-nav' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tentang-kami') ? 'active-nav' : '' }}" href="/#tentang">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('katalog*') ? 'active-nav' : '' }}" href="/katalog">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pesanan*') ? 'active-nav' : '' }}" href="/pesanan">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontak') ? 'active-nav' : '' }}"
                    href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>

          <div class="d-flex justify-content-center align-items-center gap-3 mt-3 mt-lg-0">

    @guest

        <a href="{{ route('login') }}"
           class="btn btn-yellow px-4 py-2 fw-bold"
           style="font-size: 0.9rem; border-radius: 6px;">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="btn btn-yellow px-4 py-2 fw-bold"
           style="font-size: 0.9rem; border-radius: 6px;">
            Registrasi
        </a>

    @else
        @php
            $cartItemCount = \App\Models\Cart::where('user_id', Auth::id())->count();
        @endphp

        <a href="{{ route('cart.index') }}"
           class="text-white text-decoration-none position-relative me-2 d-flex align-items-center"
           style="transition: 0.3s;"
           onmouseover="this.style.color='var(--accent-yellow)'"
           onmouseout="this.style.color='white'">

            <i class="bi bi-cart3" style="font-size: 1.5rem;"></i>

            {{-- Angka akan otomatis menyesuaikan database --}}
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-2 border-dark"
                  style="font-size: 0.65rem; padding: 0.35em 0.5em;">
                {{ $cartItemCount }}
            </span>
        </a>

        {{-- Dropdown Profile --}}
        <div class="dropdown">

            <a class="text-decoration-none d-flex align-items-center gap-2"
               href="#"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">

                <div class="profile-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <i class="bi bi-chevron-down text-white small dropdown-arrow"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-2">

                <li class="px-3 py-2">
                    <div class="d-flex flex-column">
                        <span class="fw-bold text-navy" style="font-size: 0.95rem;">
                            {{ Auth::user()->name }}
                        </span>

                        <small class="text-muted">
                            {{ Auth::user()->email }}
                        </small>
                    </div>
                </li>

                <li><hr class="dropdown-divider"></li>

                @if(Auth::user()->role === 'admin')
                    <li>
                        <a class="dropdown-item py-2 fw-medium rounded-3"
                           href="{{ route('admin.dashboard') }}">

                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard Admin
                        </a>
                    </li>
                @endif

                <li>
                    <a class="dropdown-item py-2 fw-medium rounded-3" href="{{ route('profile.index') }}">
                        <i class="bi bi-person-circle me-2"></i>
                        View Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item py-2 fw-medium text-danger rounded-3"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>

                    <form id="logout-form"
                          action="{{ route('logout') }}"
                          method="POST"
                          class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>

    @endguest

</div>
        </div>
    </div>
</nav>
