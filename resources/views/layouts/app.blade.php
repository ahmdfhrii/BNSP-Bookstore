<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - FahriBooks</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
    /* ==========================================
       GLOBAL STYLE
    ========================================== */
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root{
        --navy-color: #1f2940;
        --yellow-color: #f8b133;
        --yellow-hover: #e2a12f;
        --light-bg: #f5f7fb;
        --input-bg: #eef1f5;
        --text-color: #2d3748;
    }

    html{
        scroll-behavior: smooth;
    }

    body{
        font-family: 'Poppins', sans-serif !important;
        background: var(--light-bg);
        color: var(--text-color);

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;

        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    h1,h2,h3,h4,h5,h6{
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    a{
        text-decoration: none;
    }

    /* ==========================================
       COLOR SYSTEM
    ========================================== */
    .bg-navy{
        background: var(--navy-color) !important;
    }

    .text-navy{
        color: var(--navy-color) !important;
    }

    .text-yellow{
        color: var(--yellow-color) !important;
    }

    /* ==========================================
       NAVBAR
    ========================================== */
    .navbar{
        backdrop-filter: blur(12px);
        background: rgba(31, 41, 64, 0.97) !important;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .navbar-brand img{
        transition: 0.3s ease;
    }

    .navbar-brand img:hover{
        transform: scale(1.03);
    }

    .nav-link{
        position: relative;
        color: white !important;
        font-weight: 500;
        transition: 0.3s ease;
        padding: 8px 12px !important;
    }

    .nav-link::after{
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 0%;
        height: 2px;
        background: var(--yellow-color);
        transition: 0.3s;
        border-radius: 50px;
    }

    .nav-link:hover{
        color: var(--yellow-color) !important;
    }

    .nav-link:hover::after{
        width: 70%;
    }

    /* ==========================================
       BUTTON
    ========================================== */
    .btn-yellow{
        background: var(--yellow-color) !important;
        color: var(--navy-color) !important;
        border: none !important;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s ease;
        box-shadow: 0 4px 12px rgba(248,177,51,0.25);
    }

    .btn-yellow:hover{
        background: var(--yellow-hover) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(248,177,51,0.35);
    }

    /* ==========================================
       CARD DESIGN
    ========================================== */
    .login-card,
    .register-card{
        background: white;
        border: none;
        border-radius: 22px;
        overflow: hidden;

        box-shadow:
        0 10px 30px rgba(0,0,0,0.05),
        0 2px 8px rgba(0,0,0,0.03);
    }

    .login-card{
        max-width: 460px;
        width: 100%;
    }

    .register-card{
        max-width: 950px;
        width: 100%;
    }
    .form-control-custom,
    .input-group-text-custom{
        background: var(--input-bg) !important;
        border: 1px solid transparent !important;
        border-radius: 12px !important;
        padding: 12px 15px;
    }

    .form-control-custom{
        transition: 0.3s ease;
    }

    .form-control-custom:focus{
        background: white !important;
        border-color: var(--yellow-color) !important;
        box-shadow: 0 0 0 4px rgba(248,177,51,0.15) !important;
    }

    /* ==========================================
       DROPDOWN
    ========================================== */
    .dropdown-menu{
        border-radius: 16px;
        padding: 10px;
        min-width: 220px;
    }

    .dropdown-item{
        border-radius: 10px;
        transition: 0.2s ease;
    }

    .dropdown-item:hover{
        background: #f4f6fa;
    }

    /* ==========================================
   PROFILE AVATAR
========================================== */

.profile-avatar{

    width: 45px;
    height: 45px;

    border-radius: 50%;

    background: white;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 2px solid var(--yellow-color);

    transition: 0.3s ease;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.08);
}

.profile-avatar i{

    font-size: 1.2rem;

    color: var(--navy-color);
}

.profile-avatar:hover{

    transform: scale(1.06);

    background: var(--yellow-color);
}

.dropdown-arrow{
    transition: 0.3s ease;
}

.dropdown-toggle.show .dropdown-arrow{
    transform: rotate(180deg);
}

/* ==========================================
   DROPDOWN ANIMATION
========================================== */

.dropdown-menu{
    animation: dropdownFade 0.2s ease;
}

@keyframes dropdownFade{

    from{
        opacity: 0;
        transform: translateY(10px);
    }

    to{
        opacity: 1;
        transform: translateY(0);
    }
}

    /* ==========================================
       MAIN CONTENT
    ========================================== */
    main{
        flex: 1;
    }

    /* ==========================================
       RESPONSIVE
    ========================================== */
    @media(max-width: 991px){

        .navbar-nav{
            margin-top: 20px;
        }

        .nav-link{
            padding: 12px !important;
        }

        .btn-yellow{
            width: 100%;
}
        }
        .active-nav{
            color: var(--yellow-color) !important;
        }

        .active-nav::after{
            width: 70%;
        }

.footer-fahribooks{
    background: linear-gradient(
        to bottom,
        #ffffff,
        #f5f7fb
    );

    border-top: 1px solid rgba(0,0,0,0.05);
}

.footer-logo-wrapper img{
    transition: 0.3s ease;
}

.footer-logo-wrapper img:hover{
    transform: scale(1.03);
}

.footer-desc{
    color: #5b6475;
    line-height: 1.9;
    font-size: 0.95rem;
    max-width: 350px;
}

.footer-title{
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--navy-color);
    margin-bottom: 20px;
    position: relative;
}

.footer-title::after{
    content: '';
    position: absolute;
    left: 0;
    bottom: -8px;

    width: 45px;
    height: 3px;

    background: var(--yellow-color);
    border-radius: 20px;
}

.footer-links{
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li{
    margin-bottom: 14px;
}

.footer-links a{
    color: #4a5568;
    text-decoration: none;

    display: inline-flex;
    align-items: center;
    gap: 8px;

    transition: 0.3s ease;
    font-weight: 500;
}

.footer-links a i{
    font-size: 0.8rem;
}

.footer-links a:hover{
    color: var(--yellow-color);
    transform: translateX(4px);
}

.footer-contact{
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.footer-contact-item{
    display: flex;
    align-items: flex-start;
    gap: 12px;

    color: #4a5568;
    line-height: 1.7;
    font-size: 0.95rem;
}

.footer-contact-item i{
    color: var(--yellow-color);
    font-size: 1rem;
    margin-top: 3px;
}

.footer-social-text{
    color: #5b6475;
    line-height: 1.8;
    font-size: 0.95rem;
}

.footer-social{
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.footer-social a{
    width: 45px;
    height: 45px;

    border-radius: 50%;

    background: white;
    color: var(--navy-color);

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 1.1rem;

    transition: 0.3s ease;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.05);
}

.footer-social a:hover{
    background: var(--yellow-color);
    color: var(--navy-color);

    transform: translateY(-4px);
}

.footer-bottom{
    background: var(--navy-color);
    color: rgba(255,255,255,0.8);

    padding: 18px 0;
    font-size: 0.9rem;
}
/* ==========================================
   AUTH PAGE
========================================== */

.login-card,
.register-card{

    backdrop-filter: blur(12px);

    background:
    rgba(255,255,255,0.95);

    border:
    1px solid rgba(255,255,255,0.4);
}

/* INPUT ICON */

.input-group-text-custom{

    border: none !important;

    background: var(--input-bg);

    color: #6b7280;
}

/* INPUT */

.form-control-custom{

    border: none !important;

    background: var(--input-bg);

    height: 50px;
}

/* INPUT FOCUS */

.form-control-custom:focus{

    background: white !important;

    box-shadow:
    0 0 0 4px rgba(248,177,51,0.12) !important;
}

/* AUTH HEADER */

.bg-gray-custom{

    background:
    linear-gradient(
        to right,
        rgba(255,255,255,0.9),
        rgba(245,247,251,0.95)
    );


}

</style>
</head>
<body>

    @include('layouts.navbar')

    @yield('page-header')

    <main class="flex-grow-1 d-flex align-items-center justify-content-center py-5">
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
