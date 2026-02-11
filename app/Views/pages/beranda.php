<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- CSS -->
<style>
    :root {
        --primary-green: #10b981;   
        --dark-green: #064e3b;      
        --soft-green: #d1fae5;      
        --bg-white: #ffffff;
        --bg-off-white: #f8fafc; 
        --text-dark: #1e293b;
        --text-muted: #64748b;  
        --accent-gold: #f59e0b;
    }

    body { 
        font-family: 'Poppins', sans-serif; 
        color: var(--text-dark); 
        background-color: var(--bg-off-white);
        overflow-x: hidden;
    }

    /* === HERO SECTION dengan VIDEO Arif Agro Farm === */
    .hero-video-wrapper {
        position: relative;
        height: 115vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        margin-top: -80px; 
    }

    .hero-video {
        position: absolute;
        top: 50%; left: 50%;
        min-width: 100%; min-height: 100%;
        width: auto; height: auto;
        z-index: 0;
        transform: translateX(-50%) translateY(-50%);
        object-fit: cover;
    }

    .hero-overlay-dark {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.8), rgba(16, 185, 129, 0.6));
        z-index: 1;
    }

    .hero-content-inner {
        position: relative;
        z-index: 2;
        text-align: center;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        padding: 0 20px;
        max-width: 900px;
    }

    .hero-title {
        font-weight: 800;
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
    }

    .btn-hero {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.5);
        padding: 12px 40px;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.4s ease;
        color: white;
    }

    .btn-hero:hover {
        background: var(--primary-green);
        border-color: var(--primary-green);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
        color: white;
    }

    #audioControl {
        position: absolute;
        bottom: 100px; right: 40px;
        z-index: 10;
        background: rgba(255, 255, 255, 0.15);
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(5px);
        transition: 0.3s;
        width: 50px; height: 50px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%;
    }
    #audioControl:hover { background: var(--primary-green); border-color: var(--primary-green); transform: scale(1.1); }

    .section-label {
        color: var(--primary-green);
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 10px;
    }

    .custom-shape-divider-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
        z-index: 2;
    }

    .custom-shape-divider-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
    }

    .shape-fill { fill: var(--bg-white); }

    .custom-shape-divider-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        z-index: 1;
    }
    .custom-shape-divider-top svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 60px;
    }
    .shape-fill-green { fill: var(--soft-green); }

    /* === SECTION: ABOUT/WELCOME === */
    .section-welcome {
        background-color: var(--bg-white);
        padding-top: 50px;
        padding-bottom: 100px;
    }

    .quote-box {
        background: #fff;
        border-left: 5px solid var(--primary-green);
        border-radius: 0 20px 20px 0;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        padding: 30px;
        position: relative;
    }

    .quote-box::before {
        content: '"';
        font-family: serif;
        font-size: 5rem;
        color: var(--soft-green);
        position: absolute;
        top: -20px; left: 10px;
        z-index: 0;
    }

    .quote-content { position: relative; z-index: 1; }

    /* === SECTION: ABOUT SUMMARY (GREEN) === */
    .section-about-summary {
        background-color: var(--soft-green);
        position: relative;
        padding: 100px 0;
    }

    .feature-item {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .feature-item:hover { 
        transform: translateX(10px); 
    }

    .feature-icon-small {
        width: 50px; height: 50px;
        background: var(--soft-green);
        color: var(--primary-green);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        margin-right: 15px;
    }

    /* === SECTION: SERVICES === */
    .section-services {
        background-color: var(--bg-white);
        padding: 100px 0;
    }
    
    .service-card-home {
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        transition: 0.4s;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }

    .service-card-home:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-green);
    }

    .service-icon-home {
        width: 80px; height: 80px;
        background: var(--soft-green);
        color: var(--primary-green);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 25px;
        transition: 0.4s;
    }

    .service-card-home:hover .service-icon-home {
        background: var(--primary-green);
        color: white;
        transform: rotate(15deg);
    }

    /* === SECTION: PRODUCTS === */
    .section-products {
        background-color: var(--bg-off-white);
        padding: 80px 0;
    }

    .product-card-mini {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        transition: 0.3s;
    }

    .product-card-mini:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 15px 30px rgba(0,0,0,0.1); 
    }

    .product-img-mini { 
        height: 200px; 
        object-fit: cover; 
        width: 100%; 
    }

    /* === Call to Action CARD === */
    .cta-card {
        background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(6, 78, 59, 0.3);
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.5rem; }
        .custom-shape-divider-bottom svg, .custom-shape-divider-top svg { height: 40px; }
        #audioControl { bottom: 80px; right: 20px; }
    }
</style>

<!-- Hero Section -->
<div class="hero-video-wrapper">
    <video id="bgVideo" class="hero-video" autoplay muted loop playsinline>
        <source src="videohome.mp4" type="video/mp4">
        Browser Anda tidak mendukung tag video.
    </video>

    <div class="hero-overlay-dark"></div>

    <div class="container hero-content-inner" data-aos="zoom-in" data-aos-duration="1000">
        <h1 class="hero-title">PT. Arif Agro Farm</h1>
        <p class="lead fs-4 mb-5 text-light opacity-90">Inovasi Pertanian Modern untuk Indonesia yang Lebih Hijau</p>
        <a href="#welcome" class="btn btn-hero">Jelajahi Kami</a>
    </div>

    <button id="audioControl" onclick="toggleAudio()" title="Suara">
        <i class="bi bi-volume-mute-fill fs-5" id="audioIcon"></i>
    </button>
</div>

<!-- About Welcome -->
<div class="section-welcome" id="welcome">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-5" data-aos="fade-right">
                <span class="section-label mt-5">Sambutan Hangat</span>
                <h2 class="fw-bold mb-4 display-6 text-dark">Pesan dari Direktur Utama</h2>
                
                <figure class="quote-box">
                    <blockquote class="blockquote mb-0 quote-content">
                        <p class="fs-5 fst-italic text-muted lh-base">"Kami percaya bahwa pertanian bukan hanya tentang menanam, tetapi tentang merawat kehidupan. Di Arif Agro Farm, teknologi dan alam berjalan beriringan untuk menciptakan masa depan pangan yang berkelanjutan."</p>
                    </blockquote>
                    <figcaption class="blockquote-footer mt-4 mb-0 fw-bold text-success fs-6 quote-content">
                        Muhammad Arif Amrullah, S.Kom., M.P., M.Si. 
                        <cite title="Role" class="fw-normal text-dark d-block mt-1 small text-uppercase ls-1">Dirut PT. Arif Agro Farm</cite>
                    </figcaption>
                </figure>
            </div>
            
            <!-- Video Sambutan -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ratio ratio-16x9 shadow-lg rounded-4 overflow-hidden border border-4 border-white position-relative">
                    <video src="Sambutan.mp4" controls class="w-100 h-100" style="object-fit: cover;"></video>
                </div>
                <p class="text-center text-muted small mt-3"><i class="bi bi-play-circle-fill text-success me-1"></i> Putar Video Sambutan</p>
            </div>
        </div>
    </div>
</div>

<!-- About Summary -->
<div class="section-about-summary">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 mb-4 mb-md-0" data-aos="fade-up">
                <div class="position-relative">
                    <div class="ratio ratio-1x1 rounded-4 shadow-lg overflow-hidden border border-4 border-white">
                        <img src="img/Tentang_Kami.jpeg" class="object-fit-cover" alt="Greenhouse">
                    </div>
                    <div class="bg-white p-3 rounded-4 shadow position-absolute bottom-0 end-0 translate-middle-y me-n4 mb-3 d-none d-md-block border-start border-5 border-success">
                        <h5 class="mb-0 fw-bold text-dark">Est. <?= $profile['tahun_berdiri'] ?? '2021'; ?></h5>
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Trusted Quality</small>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ps-md-5" data-aos="fade-up" data-aos-delay="200">
                <span class="section-label">Tentang Kami</span>
                <h2 class="fw-bold mb-4 text-dark display-6">Membangun Pertanian Presisi</h2>
                
                <p class="lead text-dark opacity-75 mb-4">
                    <?= isset($profile['deskripsi']) ? substr($profile['deskripsi'], 0, 250) . '...' : 'Kami adalah perusahaan agritech...'; ?>
                </p>

                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <div class="feature-icon-small"><i class="bi bi-patch-check-fill"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">100% Organik</h6>
                                <small class="text-muted">Bebas Pestisida</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <div class="feature-icon-small"><i class="bi bi-cpu-fill"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">Smart Farming</h6>
                                <small class="text-muted">Teknologi IoT</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="/tentang-kami" class="btn btn-outline-success rounded-pill px-4 fw-bold">Selengkapnya Tentang Kami <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Landing Page Services -->
<div class="section-services">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Apa yang Kami Tawarkan?</span>
            <h2 class="fw-bold text-dark display-6">Layanan Unggulan</h2>
            <div style="width: 60px; height: 4px; background: var(--primary-green); margin: 15px auto; border-radius: 2px;"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <?php 
            // Data Dummy Produk jika kosong
            $dummyServices = [
                ['judul' => 'Suplai Sayur', 'deskripsi' => 'Sayuran segar hidroponik kualitas premium.', 'ikon' => 'bi-cart-check'],
                ['judul' => 'Instalasi IoT', 'deskripsi' => 'Pemasangan sensor & irigasi otomatis.', 'ikon' => 'bi-router'],
                ['judul' => 'Pelatihan', 'deskripsi' => 'Edukasi pertanian modern untuk pemula.', 'ikon' => 'bi-people']
            ];
            $servicesData = !empty($services) ? $services : $dummyServices;
            ?>

            <?php foreach($servicesData as $s): ?>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card-home">
                    <div class="service-icon-home">
                        <i class="bi <?= $s['ikon'] ?? 'bi-star'; ?>"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3"><?= $s['judul']; ?></h4>
                    <p class="text-muted mb-0"><?= $s['deskripsi']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="/layanan" class="btn btn-success rounded-pill px-5 py-3 fw-bold shadow-lg">Lihat Semua Layanan</a>
        </div>
    </div>
</div>

<!-- Landing Page Produk -->
<div class="section-products">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-right">
            <div>
                <span class="section-label">Dari Kebun Kami</span>
                <h2 class="fw-bold text-dark">Produk Terbaru</h2>
            </div>
            <a href="/produk" class="text-success fw-bold text-decoration-none d-none d-md-block">Lihat Katalog <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            <?php 
            // Data Dummy Produk jika kosong
            $dummyProducts = [
                ['nama_produk' => 'Melon Golden', 'kategori' => 'Buah', 'foto' => 'melon.jpg'],
                ['nama_produk' => 'Selada Romaine', 'kategori' => 'Sayur', 'foto' => 'lettuce.jpg'],
                ['nama_produk' => 'Tomat Cherry', 'kategori' => 'Sayur', 'foto' => 'tomato.jpg'],
                ['nama_produk' => 'Benih Cabai', 'kategori' => 'Bibit', 'foto' => 'seeds.jpg']
            ];
            $productsData = !empty($products) ? $products : $dummyProducts;
            ?>

            <?php foreach(array_slice($productsData, 0, 4) as $p): ?>
            <div class="col-md-3 col-sm-6" data-aos="zoom-in-up">
                <div class="card h-100 product-card-mini">
                    <div class="position-relative">
                        <img src="/img/products/<?= $p['foto']; ?>" class="product-img-mini" alt="<?= $p['nama_produk']; ?>" onerror="this.src='https://source.unsplash.com/300x300/?vegetable,fruit'">
                        <span class="badge bg-white text-success position-absolute top-0 start-0 m-3 shadow-sm"><?= $p['kategori']; ?></span>
                    </div>
                    <div class="card-body text-center p-3">
                        <h6 class="fw-bold text-dark mb-0"><?= $p['nama_produk']; ?></h6>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4 d-md-none">
            <a href="/produk" class="btn btn-outline-success rounded-pill w-100">Lihat Katalog</a>
        </div>
    </div>
</div>

<!-- Preview Berita Terbaru -->
<div class="section-welcome pb-5">
    <div class="container">
        
        <div class="mb-5" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark mb-0">Kabar Terbaru</h3>
                <a href="/berita" class="text-muted small text-decoration-none">Arsip Berita <i class="bi bi-chevron-right"></i></a>
            </div>

            <?php if(!empty($latest_news)): ?>
            <div class="card border-0 shadow-sm overflow-hidden rounded-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/news/<?= $latest_news['foto']; ?>" class="img-fluid h-100 object-fit-cover w-100" style="min-height: 250px;" alt="News" onerror="this.src='https://source.unsplash.com/600x400/?meeting'">
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5">
                            <span class="badge bg-soft-green text-success mb-2"><?= $latest_news['kategori'] ?? 'Umum'; ?></span>
                            <h4 class="card-title fw-bold text-dark"><?= $latest_news['judul']; ?></h4>
                            <p class="card-text text-muted"><?= substr($latest_news['konten_singkat'], 0, 120); ?>...</p>
                            <a href="<?= base_url('/berita'); ?>" class="btn btn-sm btn-outline-success rounded-pill px-4 mt-2">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="alert alert-light text-center text-muted">Belum ada berita terbaru saat ini.</div>
            <?php endif; ?>
        </div>

        <!-- Call to Action di beranda -->
        <div class="cta-card text-white p-5 text-center position-relative" data-aos="zoom-in">
            <div style="position: absolute; top:0; left:0; width:100%; height:100%; background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 20px 20px; opacity: 0.5;"></div>
            <div class="position-relative z-1">
                <h2 class="fw-bold mb-3 display-6">Siap Berkolaborasi?</h2>
                <p class="lead mb-4 opacity-90 col-lg-8 mx-auto">Baik sebagai mitra bisnis, petani binaan, atau bagian dari tim kami.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="/kontak" class="btn btn-light text-success fw-bold rounded-pill px-5 py-3 shadow-lg">Hubungi Kami</a>
                    <a href="/karir" class="btn btn-outline-light rounded-pill px-5 py-3 fw-bold">Karir</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, offset: 50, duration: 800, easing: 'ease-out-cubic' });

    function toggleAudio() {
        var video = document.getElementById("bgVideo");
        var icon = document.getElementById("audioIcon");
        var btn = document.getElementById("audioControl");
        
        if (video.muted) {
            video.muted = false;
            icon.classList.replace("bi-volume-mute-fill", "bi-volume-up-fill");
            btn.style.background = "var(--primary-green)";
            btn.style.borderColor = "var(--primary-green)";
        } else {
            video.muted = true;
            icon.classList.replace("bi-volume-up-fill", "bi-volume-mute-fill");
            btn.style.background = "rgba(255, 255, 255, 0.15)";
            btn.style.borderColor = "rgba(255, 255, 255, 0.3)";
        }
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>