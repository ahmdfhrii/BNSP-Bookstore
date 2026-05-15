<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy-bg: #2b3046;
            --main-bg: #f4f6f9;
            --primary-blue: #3b82f6;
            --text-gray: #6c757d;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--main-bg);
            overflow-x: hidden;
        }

        /* NAVBAR ATAS */
        .top-navbar {
            background-color: white;
            height: 70px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            z-index: 10;
        }
        .logo-area {
            width: 260px;
            display: flex;
            align-items: center;
            padding-left: 20px;
        }
        .search-bar {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 8px 15px;
            width: 350px;
        }

        /* SIDEBAR KIRI */
        .sidebar {
            width: 260px;
            background-color: var(--navy-bg);
            min-height: calc(100vh - 70px);
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #a0aec0;
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .sidebar .nav-link:hover {
            color: white;
        }
        /* Style untuk Menu Aktif (Pil Putih) */
        .sidebar .nav-link.active {
            background-color: white;
            color: var(--navy-bg);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* KONTEN UTAMA */
        .main-content {
            flex-grow: 1;
            padding: 30px;
        }

        /* FOOTER */
        .footer {
            background-color: white;
            padding: 15px;
            text-align: center;
            color: var(--text-gray);
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="top-navbar d-flex align-items-center position-relative">
        <div class="logo-area border-end d-flex align-items-center gap-2">
                <img src="{{ asset('storage/images/fahribooks.png') }}" alt="Logo FahriBooks" style="height: 60px; object-fit: contain;">

                <h4 class="fw-bold m-0 mt-1" style="color: var(--navy-bg); font-size: 1.4rem; letter-spacing: -0.5px;">
                    Fahri<span style="color: #f59e0b;">Books</span>
                </h4>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-grow-1 px-4">
            <div class="d-flex align-items-center gap-4">
                <i class="fas fa-bars fs-4 text-secondary cursor-pointer"></i>
                <div class="position-relative">
                    <input type="text" class="form-control search-bar pe-5" placeholder="Search">
                    <i class="fas fa-search position-absolute text-muted" style="top: 10px; right: 15px;"></i>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4">
    <i class="fas fa-bell fs-5 text-secondary cursor-pointer position-relative">
        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="width: 8px; height: 8px;"></span>
    </i>

    <i class="fas fa-list-ul fs-5 text-secondary cursor-pointer"></i>

    <div class="dropdown">
        <button class="btn btn-light rounded-pill border-0 fw-bold text-dark d-flex align-items-center gap-2 px-2 py-1"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="background-color: #f8f9fa;">

            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                 style="width: 35px; height: 35px; background: linear-gradient(135deg, #3b82f6, #2563eb);">
                <i class="fas fa-user text-white" style="font-size: 16px;"></i>
            </div>

            <span class="ms-1 me-1" style="color: #2b3046; font-size: 0.95rem;">
                {{ Auth::user()->name }}
            </span>

            <i class="fas fa-chevron-down me-2 text-muted" style="font-size: 10px;"></i>
        </button>

        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 py-2" style="border-radius: 12px; min-width: 220px;">
            <li class="px-3 py-2 mb-2 border-bottom">
                <div class="d-flex flex-column">
                    <span class="fw-bold text-dark" style="font-size: 0.9rem;">{{ Auth::user()->name }}</span>
                    <span class="text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email }}</span>
                </div>
            </li>
            <li>
                <a class="dropdown-item py-2 fw-medium" href="#">
                    <i class="fas fa-user-circle me-2 text-secondary"></i> Profil Saya
                </a>
            </li>
            <li>
                <a class="dropdown-item py-2 fw-medium" href="/">
                    <i class="fas fa-external-link-alt me-2 text-secondary"></i> Lihat Website
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger py-2 fw-bold">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
        </div>
    </div>

    <div class="d-flex">

        <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-border-all fs-5"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item mt-2">
                    <a class="nav-link text-white justify-content-between cursor-pointer" data-bs-toggle="collapse" href="#dataTablesMenu">
                        <div><i class="fas fa-list fs-5 me-3"></i> Data Tables</div>
                        <i class="fas fa-chevron-down fs-6"></i>
                    </a>
                    <div class="collapse show" id="dataTablesMenu">
                        <ul class="nav flex-column ms-3 mt-1">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-user-friends fs-6"></i> Data Pengguna
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.books.*') ? 'active' : '' }}" href="{{ route('admin.books.index') }}">
                                    <i class="fas fa-book fs-6"></i> Data Buku
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                                    <i class="fas fa-tags fs-6"></i> Data Kategori
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                                    <i class="fas fa-shopping-cart fs-6"></i> Data Pesanan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="d-flex flex-column flex-grow-1">
            <div class="main-content">
                {{ $page_content ?? $slot }}
            </div>

            <div class="footer">
                Copyright &copy; 2026 FahriBooks
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
