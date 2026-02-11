<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- CSS -->
    <style>
        :root {
            --primary-green: #198754;
            --dark-green: #0f5132;
            --footer-bg: #1a252f;
            --text-gray: #bdc3c7;
        }

        html {
            font-size: 14px;
        }

        body { 
            font-family: 'Poppins', sans-serif; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }
        
        /* NAVBAR STYLING */
        .navbar { 
            padding: 10px 0;
            transition: all 0.4s ease-in-out;
        }

        .navbar-transparent {
            background-color: transparent !important;
            box-shadow: none !important;
        }
        
        .navbar-transparent .nav-link {
            color: rgba(255,255,255,0.9) !important;
        }
        
        .navbar-transparent .navbar-brand {
            color: #fff !important;
        }

        .navbar-transparent .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
            filter: invert(1); 
        }

        .navbar-solid {
            background-color: #ffffff !important;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
            padding: 5px 0;
        }

        .navbar-brand { 
            font-weight: 700; 
            font-size: 1.1rem;
            color: var(--primary-green); 
            display: flex; 
            align-items: center; 
            transition: color 0.3s; 
        }
        .navbar-brand img { height: 35px; margin-right: 10px; }
        
        .nav-link { 
            font-weight: 500; 
            font-size: 0.9rem;
            color: #555; 
            margin: 0 3px; 
            transition: color 0.3s ease;
            position: relative;
            white-space: nowrap;
        }
        
        .nav-link::after {
            content: ''; display: block; width: 0; height: 2px;
            background: var(--primary-green);
            transition: width .3s; position: absolute; bottom: 0; left: 0;
        }

        .nav-item:last-child .nav-link::after {
            display: none !important;
        }

        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .navbar-solid .nav-link:hover, .navbar-solid .nav-link.active { color: var(--primary-green) !important; }
        .navbar-transparent .nav-link:hover, .navbar-transparent .nav-link.active { color: #fff !important; }

        .btn-kontak {
            background-color: var(--primary-green);
            color: white !important;
            border-radius: 20px;
            font-size: 0.85rem !important;
            padding: 6px 20px !important;
            transition: all 0.3s;
        }

        .btn-kontak:hover { 
            background-color: var(--dark-green); 
            transform: translateY(-2px); 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-decoration: none !important;
         }

        /* --- FOOTER IMPROVEMENTS --- */
        footer { 
            background-color: var(--footer-bg); 
            color: #ecf0f1; 
            margin-top: auto; 
            padding-top: 50px; 
        }
        
        .footer-title { 
            font-weight: 700; 
            color: #fff; 
            margin-bottom: 20px; 
            font-size: 1.1rem;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 35px;
            height: 3px;
            background: var(--primary-green);
            border-radius: 2px;
        }

        .footer-link { 
            color: var(--text-gray); 
            text-decoration: none; 
            display: block; 
            margin-bottom: 8px; 
            transition: all 0.3s ease; 
            font-size: 0.85rem;
        }
        
        .footer-link:hover { 
            color: var(--primary-green); 
            padding-left: 10px;
        }

        footer-info a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-info a:hover { color: var(--primary-green); }

        .footer-info span {
            word-break: break-word;
            line-height: 1.4;
            font-size: 0.85rem;
        }

        .footer-info li { 
            display: flex; 
            margin-bottom: 12px; 
            color: var(--text-gray); 
            align-items: flex-start;
            color: #ffffff;
        }
        
        .footer-info i { 
            margin-right: 12px; 
            color: var(--primary-green); 
            font-size: 1rem; 
            background: rgba(25, 135, 84, 0.1);
            padding: 6px;
            border-radius: 6px;
            line-height: 1;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px; /* Diperkecil */
            height: 35px;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            color: #fff;
            margin-right: 8px;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: var(--primary-green);
            transform: translateY(-3px);
        }

        .map-container {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            margin-top: 5px;
        }

        .map-container iframe { width: 100%; height: 180px; border: 0; }

        .copyright { 
            background-color: #151e26; 
            padding: 15px 0;
            margin-top: 40px; 
            font-size: 0.8rem; 
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        
        .heart-icon { color: #e74c3c; animation: beat 1s infinite alternate; display: inline-block; }
        @keyframes beat { to { transform: scale(1.3); } }

        /* RESPONSIVITAS */
        @media (max-width: 991px) {
            footer { text-align: center; padding-top: 40px; }
            .footer-title::after { left: 50%; transform: translateX(-50%); }
            .footer-info li { justify-content: center; text-align: center; flex-direction: column; align-items: center; }
            .footer-info i { margin-right: 0; margin-bottom: 8px; }
            .footer-link:hover { padding-left: 0; transform: translateY(-3px); }
        }

        @media (max-width: 991.98px) {
        .navbar-collapse {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            margin-top: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .navbar-transparent .nav-link {
            color: #333 !important;
        }
        
        .navbar-transparent .nav-link.active {
            color: var(--primary-green) !important;
        }

        /* Styling Baris Hamburger */
        .navbar-toggler {
            width: 30px;
            height: 30px;
            padding: 0;
            border: none;
            background: transparent;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .toggler-bar {
            display: block;
            width: 25px;
            height: 3px;
            background-color: var(--primary-green);
            border-radius: 2px;
            transition: all 0.3s ease-in-out;
        }

        /* Warna putih saat navbar transparan */
        .navbar-transparent .toggler-bar {
            background-color: #fff;
        }

        /* Animasi Menjadi X */
        .navbar-toggler:not(.collapsed) .toggler-bar:nth-child(1) {
            transform: translateY(10px) rotate(45deg);
        }

        .navbar-toggler:not(.collapsed) .toggler-bar:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggler:not(.collapsed) .toggler-bar:nth-child(3) {
            transform: translateY(-10px) rotate(-45deg);
        }
    }
    </style>

  </head>
  <body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent transition-all" id="mainNavbar">
  <div class="container">
    <a class="navbar-brand d-none d-lg-flex" href="/">
        <img src="/img/logo_AAF.png" alt="Logo Arif Agro"> 
        PT. Arif Agro Farm
    </a>

    <a class="navbar-brand d-lg-none" href="/">
        <img src="/img/logo_AAF.png" alt="Logo Arif Agro">
    </a>

    <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="toggler-bar"></span>
        <span class="toggler-bar"></span>
        <span class="toggler-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="d-lg-none text-center py-3 border-bottom mb-3">
          <img src="/img/logo_AAF.png" alt="Logo" style="height: 50px;">
          <div class="fw-bold mt-2 text-success">PT. Arif Agro Farm</div>
      </div>

      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link <?= ($active == 'beranda') ? 'active' : ''; ?>" href="/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link <?= ($active == 'tentang') ? 'active' : ''; ?>" href="/tentang-kami">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link <?= ($active == 'layanan') ? 'active' : ''; ?>" href="/layanan">Layanan</a></li>
        <li class="nav-item"><a class="nav-link <?= ($active == 'produk') ? 'active' : ''; ?>" href="/produk">Produk</a></li>
        <li class="nav-item"><a class="nav-link <?= ($active == 'berita') ? 'active' : ''; ?>" href="/berita">Berita</a></li>
        <li class="nav-item"><a class="nav-link <?= ($active == 'karir') ? 'active' : ''; ?>" href="/karir">Karir</a></li>
        <li class="nav-item"><a class="nav-link <?= ($active == 'galeri') ? 'active' : ''; ?>" href="/galeri">Galeri</a></li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0 w-100 text-center">
            <a class="nav-link btn-kontak <?= ($active == 'kontak') ? 'active' : ''; ?>" href="/kontak">Hubungi Kami</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Section -->
<?= $this->renderSection('content'); ?>

<!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4"> 
                <div class="col-lg-4 col-md-12 mb-4">
                    <h5 class="footer-title">PT. Arif Agro Farm</h5>
                    <p class="text-secondary pe-lg-4" style="font-size: 0.85rem;">
                        Menginovasi dunia pertanian dengan teknologi modern dan kearifan lokal untuk masa depan pangan Indonesia yang lebih baik. Bergabunglah dalam revolusi pertanian berkelanjutan.
                    </p>
                    <div class="mt-3 d-flex justify-content-lg-start justify-content-center">
                        <a href="https://www.instagram.com/sahabat_tani_muda" class="social-link" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://youtube.com/@muhammadarifamrullah" class="social-link" target="_blank"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.linkedin.com/in/muhammad-arif" class="social-link" target="_blank"><i class="bi bi-linkedin"></i></a>
                        <a href="https://www.tiktok.com/@sahabat_tani_muda" class="social-link" target="_blank"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <h5 class="footer-title">Tautan Cepat</h5>
                    <div class="footer-links">
                        <a href="/" class="footer-link">Beranda</a>
                        <a href="/tentang-kami" class="footer-link">Tentang Kami</a>
                        <a href="/layanan" class="footer-link">Layanan</a>
                        <a href="/produk" class="footer-link">Produk</a>
                        <a href="/berita" class="footer-link">Berita</a>
                        <a href="/karir" class="footer-link">Karir</a>
                        <a href="/galeri" class="footer-link">Galeri</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <h5 class="footer-title">Hubungi Kami</h5>
                    <ul class="list-unstyled footer-info">
                        <li>
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Kp. Kosar 3, Kosar, Kec. Cipeundeuy, Kabupaten Subang, Jawa Barat 41272</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone-fill"></i>
                            <span><a href="https://wa.me/6283827914570?text=Halo%20Admin%20Arif%20Agro%20Farm%2C%20saya%20ingin%20bertanya%20mengenai%20layanan%20Anda." target="_blank">
                                 +62 838-2791-4570
                            </a></span>
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            <span><a href="mailto:sahabttanimuda27@gmail.com">sahabttanimuda27@gmail.com</a></span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Lokasi Kami</h5>
                    <div class="map-container shadow-sm">
                        <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.25479267097!2d107.6244472103661!3d-6.444196862987059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6915007c52aaff%3A0xb86cabf826b63d62!2sArif%20Agro%20Farm!5e1!3m2!1sid!2sid!4v1767762910711!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                </div>

            </div>
        </div>

        <div class="copyright text-center">
            <div class="container">
                <p class="mb-0">
                    © <?= date('Y'); ?> <strong></strong>. <i>Seluruh Hak Cipta Dilindungi.</i> <br class="d-md-none"> Created with <i class="bi bi-heart-fill heart-icon"></i> by PT. Arif Agro Farm
                </p>
            </div>
        </div>
    </footer>

<!-- Java Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const navbar = document.getElementById('mainNavbar');
        const logoText = document.querySelector('.navbar-brand');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 80) { 
                navbar.classList.remove('navbar-transparent', 'navbar-dark');
                navbar.classList.add('navbar-solid', 'navbar-light');
                logoText.style.color = 'var(--primary-green)';
            } else {
                navbar.classList.add('navbar-transparent', 'navbar-dark');
                navbar.classList.remove('navbar-solid', 'navbar-light');
                logoText.style.color = '#fff';
            }
        });
    </script>
  </body>
</html>