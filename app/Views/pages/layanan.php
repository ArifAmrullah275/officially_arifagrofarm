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
        --bg-gray: #f8fafc;
        --text-dark: #1e293b;
        --text-muted: #64748b;
    }

    body { 
        font-family: 'Poppins', sans-serif; 
        color: var(--text-dark); 
        background-color: var(--bg-white);
        overflow-x: hidden; 
    }

    /* === HERO HEADER === */
    .services-hero {
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.8), rgba(16, 185, 129, 0.7)), url('img/Layanan.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: -80px;
        padding-top: 80px;
        padding-bottom: 120px;
        position: relative;
    }

    .hero-content {
        position: relative;
        z-index: 5;
        max-width: 800px;
        padding: 0 15px;
    }

    .page-title {
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        text-shadow: 0 10px 30px rgba(0,0,0,0.3);
        font-size: 3.5rem;
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

    /* === FLOATING INFO BOX === */
    .info-box {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.08);
        margin-top: -100px;
        position: relative;
        z-index: 10;
        border: 1px solid rgba(255,255,255,0.5);
    }

    .info-item h3 { font-size: 2.5rem; font-weight: 800; color: var(--primary-green); margin-bottom: 0; }
    .info-item p { font-size: 0.85rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
    .border-end-custom { border-right: 1px solid #e2e8f0; }

    /* === SERVICE CARDS === */
    .service-card {
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        background: white;
        height: 100%;
        padding: 3rem 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .service-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 60px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-green);
    }

    .service-icon {
        width: 80px; height: 80px;
        background: var(--soft-green);
        color: var(--primary-green);
        border-radius: 20px;
        display: flex; align-items: center; justify-content: center;
        font-size: 2.2rem;
        margin: 0 auto 2rem auto;
        transition: 0.4s;
        transform: rotate(0deg);
    }

    .service-card:hover .service-icon {
        background: var(--primary-green);
        color: white;
        transform: rotate(10deg);
        border-radius: 50%;
    }

    .section-label {
        color: var(--primary-green);
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 10px;
    }

    /* === SECTION FEATURES === */
    .section-features {
        background-color: var(--soft-green);
        position: relative;
        padding-top: 100px;
        padding-bottom: 80px;
    }

    .feature-list-item {
        background: rgba(255,255,255,0.7);
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        border: 1px solid rgba(255,255,255,0.5);
        transition: 0.3s;
    }

    .feature-list-item:hover {
        transform: translateX(10px);
        background: white;
        border-left: 4px solid var(--primary-green);
    }

    /* === Call to Action CARD === */
    .cta-card {
        background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
        border: none;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(6, 78, 59, 0.3);
    }

    /* === MODAL STYLING === */
    .modal-service-icon {
        width: 70px; height: 70px; 
        background: var(--soft-green); 
        color: var(--primary-green);
        border-radius: 50%; 
        display: flex; align-items: center; justify-content: center; 
        font-size: 2rem;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    .contact-card-modal {
        background: #f8fafc; 
        border-radius: 15px; 
        padding: 20px; 
        border: 1px dashed var(--primary-green);
        margin-top: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .services-hero { min-height: 60vh; }
        .page-title { font-size: 2.5rem; }
        .border-end-custom { border-right: none; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px; margin-bottom: 20px; }
        .info-item:last-child .border-end-custom { border-bottom: none; }
        .custom-shape-divider-bottom svg { height: 40px; }
        .section-features { padding-top: 60px; }
        .modal-body { padding: 1.5rem; }
    }
</style>

<!-- Service Hero Section -->
<div class="services-hero">
    <div class="hero-content container" data-aos="zoom-in" data-aos-duration="1000">            
        <h1 class="display-3 page-title">Layanan Kami</h1>
        <p class="lead fs-5 mb-4 fw-light text-white opacity-90">
            Solusi Agribisnis Terintegrasi dari Hulu ke Hilir dengan Teknologi Presisi
        </p>
    </div>
</div>

<!-- Statistic Service -->
<div class="container position-relative z-3">
    <div class="info-box" data-aos="fade-up" data-aos-delay="100">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-md-0 info-item border-end-custom">
                <h3 data-aos="count-up"><?= $stats['stat1_value'] ?? '24/7'; ?></h3>
                <p><?= $stats['stat1_label'] ?? 'Konsultasi Teknis'; ?></p>
            </div>
            <div class="col-md-3 col-6 mb-md-0 info-item border-end-custom">
                <h3><?= $stats['stat2_value'] ?? 'High Tech'; ?></h3>
                <p><?= $stats['stat2_label'] ?? 'Berbasis IoT'; ?></p>
            </div>
            <div class="col-md-3 col-6 info-item border-end-custom">
                <h3><?= $stats['stat3_value'] ?? 'Fresh'; ?></h3>
                <p><?= $stats['stat3_label'] ?? 'Jaminan Kualitas'; ?></p>
            </div>
            <div class="col-md-3 col-6 info-item">
                <h3><?= $stats['stat4_value'] ?? 'Expert'; ?></h3>
                <p><?= $stats['stat4_label'] ?? 'Tim Ahli'; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Layanan Unggulan Perusahaan -->
<div class="container py-5 my-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Apa yang Kami Tawarkan?</span>
        <h2 class="fw-bold text-dark display-6">Layanan Unggulan</h2>
        <div style="width: 60px; height: 4px; background: var(--primary-green); margin: 15px auto; border-radius: 2px;"></div>
        <p class="text-muted col-lg-6 mx-auto">Kami menyediakan solusi menyeluruh mulai dari penyediaan bibit, manajemen lahan pintar, hingga distribusi hasil panen.</p>
    </div>

    <div class="row g-4 align-items-stretch">
        <?php if(!empty($services)): ?>
            <?php foreach($services as $s): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="bi <?= $s['ikon']; ?>"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3"><?= $s['judul']; ?></h4>
                    <p class="text-muted mb-4">
                        <?= substr($s['deskripsi'], 0, 100) . '...'; ?>
                    </p>
                    
                    <button type="button" 
                            class="btn btn-outline-success rounded-pill btn-sm px-4 fw-bold"
                            data-bs-toggle="modal" 
                            data-bs-target="#detailLayananModal"
                            data-title="<?= $s['judul']; ?>"
                            data-icon="<?= $s['ikon']; ?>"
                            data-desc="<?= $s['deskripsi']; ?>"
                            data-wa-message="Halo Admin Arif Agro Farm, saya tertarik dan ingin bertanya lebih lanjut mengenai layanan *<?= $s['judul']; ?>*.">
                        Detail Layanan <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center text-muted py-5">Belum ada layanan yang ditambahkan.</div>
        <?php endif; ?>
    </div>
</div>

<!-- Features Section -->
<div class="section-features">

    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="position-relative pe-lg-4">
                    <div class="ratio ratio-4x3 rounded-4 shadow-lg overflow-hidden border border-4 border-white">
                        <img src="img/Layanan.jpg" class="object-fit-cover" alt="Teknologi Kami">
                    </div>
                    <div class="position-absolute bottom-0 end-0 bg-white p-4 rounded-4 shadow me-lg-n4 mb-n4 border-start border-5 border-success d-none d-md-block">
                        <div class="d-flex align-items-center">
                            <div class="display-4 text-success me-3"><i class="bi bi-wifi"></i></div>
                            <div class="lh-1">
                                <h5 class="fw-bold mb-1 text-dark">Teknologi 4.0</h5>
                                <small class="text-muted">Real-time Monitoring</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                <span class="section-label">Bagaimana Kami Bekerja?</span>
                <h2 class="fw-bold mb-4 text-dark display-6">Pendekatan Teknologi Presisi</h2>
                <p class="text-dark opacity-75 text-justify mb-4">
                    Layanan instalasi Smart Farming kami tidak sekadar memasang alat. Kami melakukan analisis tanah, iklim mikro, dan jenis tanaman untuk merancang sistem yang paling efisien dan hemat biaya.
                </p>
                
                <div class="d-flex flex-column gap-3">
                    <div class="feature-list-item d-flex align-items-start">
                        <div class="text-success me-3 mt-1"><i class="bi bi-check-circle-fill fs-4"></i></div>
                        <div>
                            <strong class="text-dark d-block mb-1">Analisis Lahan Komprehensif</strong>
                            <span class="text-muted small">Pemetaan kondisi lahan menggunakan drone dan sensor tanah presisi tinggi.</span>
                        </div>
                    </div>
                    <div class="feature-list-item d-flex align-items-start">
                        <div class="text-success me-3 mt-1"><i class="bi bi-check-circle-fill fs-4"></i></div>
                        <div>
                            <strong class="text-dark d-block mb-1">Desain Sistem Otomatisasi</strong>
                            <span class="text-muted small">Merancang jalur irigasi, fertugasi, dan titik sensor yang optimal sesuai kontur.</span>
                        </div>
                    </div>
                    <div class="feature-list-item d-flex align-items-start">
                        <div class="text-success me-3 mt-1"><i class="bi bi-check-circle-fill fs-4"></i></div>
                        <div>
                            <strong class="text-dark d-block mb-1">Monitoring & Maintenance</strong>
                            <span class="text-muted small">Pantau kondisi kebun lewat HP kapan saja dan layanan purna jual berkala.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action Services -->
<div class="container py-5 my-5">
    <div class="cta-card text-white p-5 text-center position-relative" data-aos="zoom-in">
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 20px 20px; opacity: 0.5;"></div>
        
        <div class="position-relative z-1">
            <h2 class="fw-bold mb-3 display-5">Siap Mengembangkan Pertanian Anda?</h2>
            <p class="lead mb-5 opacity-90 col-lg-8 mx-auto">Jangan ragu untuk berkonsultasi. Tim ahli kami siap membantu meningkatkan produktivitas lahan Anda.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="/kontak" class="btn btn-light text-success fw-bold rounded-pill px-5 py-3 shadow-lg hover-scale">Hubungi Kami</a>
                <a href="https://wa.me/6283827914570?text=Halo%20saya%20tertarik%20konsultasi%20pertanian" target="_blank" class="btn btn-outline-light rounded-pill px-5 py-3 fw-bold border-2"><i class="bi bi-whatsapp me-2"></i> WhatsApp</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Layanan -->
<div class="modal fade" id="detailLayananModal" tabindex="-1" aria-labelledby="detailLayananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header bg-success text-white border-0 px-4 py-3">
                <h5 class="modal-title fw-bold" id="detailLayananModalLabel">
                    <i class="bi bi-grid-fill me-2"></i> Detail Layanan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4 p-md-5">
                <div class="row">
                    <div class="col-md-4 text-center border-end-md mb-4 mb-md-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="modal-service-icon mb-3">
                            <i id="modalIcon" class="bi bi-star"></i>
                        </div>
                        <h4 id="modalTitle" class="fw-bold text-dark mb-2">Nama Layanan</h4>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">Tersedia</span>
                    </div>
                    
                    <div class="col-md-8 ps-md-4">
                        <h6 class="fw-bold text-success text-uppercase mb-3 small letter-spacing-1">Deskripsi Lengkap</h6>
                        <p id="modalDesc" class="text-muted text-justify mb-4" style="line-height: 1.8;">
                            </p>

                        <div class="contact-card-modal">
                            <h6 class="fw-bold text-dark mb-2"><i class="bi bi-headset me-2"></i>Tertarik dengan layanan ini?</h6>
                            <p class="small text-muted mb-3">Konsultasikan kebutuhan Anda dengan tim kami sekarang.</p>
                            
                            <div class="d-flex gap-2 flex-wrap">
                                <a id="modalWaLink" href="#" target="_blank" class="btn btn-success rounded-pill btn-sm px-4 fw-bold shadow-sm">
                                    <i class="bi bi-whatsapp me-2"></i> Chat WhatsApp
                                </a>
                                <a href="/kontak" class="btn btn-outline-dark rounded-pill btn-sm px-4">
                                    <i class="bi bi-envelope me-2"></i> Kirim Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // 1. Animasi
    AOS.init({
        once: true,
        offset: 50,
        duration: 800,
        easing: 'ease-out-cubic',
    });

    // 2. Modal Dinamis
    var detailModal = document.getElementById('detailLayananModal');
    if (detailModal) {
        detailModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var title = button.getAttribute('data-title');
            var iconClass = button.getAttribute('data-icon');
            var description = button.getAttribute('data-desc');
            var waMessage = button.getAttribute('data-wa-message');

            // --- PENGATURAN NOMOR WHATSAPP ---
            var adminPhone = "6283827914570"; 

            // Update elemen di dalam Modal
            var modalTitle = detailModal.querySelector('#modalTitle');
            var modalIcon = detailModal.querySelector('#modalIcon');
            var modalDesc = detailModal.querySelector('#modalDesc');
            var modalWaLink = detailModal.querySelector('#modalWaLink');

            // Isi Text
            modalTitle.textContent = title;
            modalDesc.innerHTML = description; 
            
            // Update Ikon
            modalIcon.className = ''; 
            modalIcon.className = 'bi ' + iconClass;

            // Link WA
            var finalLink = "https://wa.me/" + adminPhone + "?text=" + encodeURIComponent(waMessage);
            
            // Set href pada tombol WA di modal
            modalWaLink.setAttribute('href', finalLink);
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>