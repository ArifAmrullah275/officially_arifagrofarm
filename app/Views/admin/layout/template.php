<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Admin Dashboard'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- CSS -->
    <style>
        :root {
            --admin-primary: #10b981;
            --admin-dark: #0f172a;
            --admin-light: #f1f5f9;
            --sidebar-width: 260px;
        }

        body { font-family: 'Poppins', sans-serif; background-color: var(--admin-light); min-height: 100vh; display: flex; flex-direction: column; }

        /* === SIDEBAR === */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background-color: var(--admin-dark);
            color: white;
            padding: 20px;
            transition: all 0.3s ease;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar { width: 5px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 10px; }

        .brand-logo {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--admin-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .brand-logo img {
            object-fit: contain;
            border-radius: 20px;
        }

        .nav-link {
            color: #94a3b8;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            font-weight: 500;
            transition: 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--admin-primary);
        }

        .nav-link i { margin-right: 12px; font-size: 1.1rem; }

        /* === MAIN CONTENT === */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: 0.3s;
        }

        .main-content {
            padding: 30px;
            flex: 1;
        }

        /* === FOOTER === */
        footer {
            background: white;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 0.9rem;
            color: #64748b;
        }

        /* === HAMBURGER NAVBAR MOBILE === */
        .mobile-header {
            display: none;
            background: var(--admin-dark);
            color: white;
            padding: 15px 20px;
            position: sticky;
            top: 0;
            z-index: 1040;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1045;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .sidebar-overlay.show { display: block; }
            .main-wrapper { margin-left: 0; }
            .mobile-header { display: flex; justify-content: space-between; align-items: center; }
        }
        
        .card-custom { border:none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .sidebar-footer { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px; }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>

    <header class="mobile-header d-md-none">
        <span class="fw-bold text-success">
            <img src="/img/logo_AAF.png" alt="Logo" width="30" class="me-2"> PT. Arif Agro Farm
        </span>
        <button class="btn btn-success btn-sm rounded-3" onclick="toggleSidebar()">
            <i class="bi bi-list fs-4"></i>
        </button>
    </header>

    <nav class="sidebar" id="sidebar">
        <a href="/admin/dashboard" class="brand-logo">
            <img src="/img/logo_AAF.png" alt="Logo" width="40" class="me-2"> Admin Panel
        </a>

        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item mt-3 mb-2 small text-uppercase text-secondary fw-bold px-3">Kelola Halaman</li>
            
            <li class="nav-item">
                <a href="/admin/about" class="nav-link <?= (str_contains(uri_string(), 'admin/about')) ? 'active' : '' ?>">
                    <i class="bi bi-info-circle"></i> Tentang Kami
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/services" class="nav-link <?= (str_contains(uri_string(), 'admin/services')) ? 'active' : '' ?>">
                    <i class="bi bi-grid"></i> Layanan
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/products" class="nav-link <?= (str_contains(uri_string(), 'admin/products')) ? 'active' : '' ?>">
                    <i class="bi bi-box-seam"></i> Produk
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/galeri" class="nav-link <?= (str_contains(uri_string(), 'admin/galeri')) ? 'active' : '' ?>">
                    <i class="bi bi-images"></i> Galeri Foto
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/orders" class="nav-link <?= (str_contains(uri_string(), 'admin/orders')) ? 'active' : '' ?>">
                    <i class="bi bi-cart-check"></i> <span>Daftar Pesanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/news" class="nav-link <?= (str_contains(uri_string(), 'admin/news')) ? 'active' : '' ?>">
                    <i class="bi bi-newspaper"></i> Berita & Artikel
                </a>
            </li>

            <li class="nav-item mt-3 mb-2 small text-uppercase text-secondary fw-bold px-3">Rekrutmen</li>
            
            <li class="nav-item">
                <a href="/admin/career" class="nav-link <?= (str_contains(uri_string(), 'admin/career')) ? 'active' : '' ?>">
                    <i class="bi bi-briefcase"></i> Karir & Loker
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/application" class="nav-link <?= (str_contains(uri_string(), 'admin/application')) ? 'active' : '' ?>">
                    <i class="bi bi-people"></i> 
                    <span>Daftar Pelamar</span>
                </a>
            </li>

            <li class="nav-item mt-3 mb-2 small text-uppercase text-secondary fw-bold px-3">Pesan & Kontak</li>

            <li class="nav-item">
                <a href="/admin/inbox" class="nav-link <?= (str_contains(uri_string(), 'admin/inbox')) ? 'active' : '' ?>">
                    <i class="bi bi-envelope"></i> Kotak Masuk
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <ul class="nav flex-column">
                <li class="nav-item mb-1">
                    <a href="/" target="_blank" class="nav-link text-white bg-success bg-opacity-10">
                        <i class="bi bi-box-arrow-up-right"></i> Lihat Website
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link text-danger" onclick="logoutConfirm()">
                        <i class="bi bi-box-arrow-right"></i> Keluar (Logout)
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-wrapper">
        <main class="main-content">
            <?= $this->renderSection('content'); ?>
        </main>

        <!-- Footer -->
        <footer>
            Created with <i class="bi bi-heart-fill text-danger mx-1"></i> by <strong>Team IT PT. Arif Agro Farm</strong> &copy; <?= date('Y'); ?>
        </footer>
    </div>

    <!-- Java Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('overlay').classList.toggle('show');
        }

        function logoutConfirm() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Sesi Anda akan berakhir dan Anda harus login kembali.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#10b981', 
                cancelButtonColor: '#334155',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-4 shadow',
                    confirmButton: 'rounded-pill px-4',
                    cancelButton: 'rounded-pill px-4'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/logout";
                }
            })
        }
    </script>
</body>
</html>