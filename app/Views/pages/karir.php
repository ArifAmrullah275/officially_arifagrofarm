<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
        font-size: 16px; 
    }

    /* === HERO HEADER === */
    .career-hero {
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.85), rgba(16, 185, 129, 0.75)), url('/img/Karir.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 115vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: -80px; 
        padding-top: 100px; 
        padding-bottom: 80px;
        position: relative;
    }

    .page-title {
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        text-shadow: 0 10px 30px rgba(0,0,0,0.3);
        font-size: clamp(2rem, 5vw, 3.5rem);
    }

    /* === CULTURE BOX === */
    .culture-box {
        background: white;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        transition: 0.3s;
        height: 100%;
        border: 1px solid #f1f5f9;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }

    .culture-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.15);
        border-color: var(--soft-green);
    }

    .culture-icon {
        width: 70px; height: 70px;
        background: var(--soft-green);
        color: var(--primary-green);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem auto;
        transition: 0.3s;
    }

    /* === Karir List === */
    .accordion-item {
        border: 1px solid #e2e8f0;
        margin-bottom: 20px;
        border-radius: 15px !important;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        background: white;
    }

    .accordion-button {
        background-color: white;
        padding: 25px 30px;
        font-weight: 700;
        color: var(--text-dark);
        border: none;
        box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
        color: var(--primary-green);
        background-color: var(--soft-green);
    }

    .job-badge {
        font-size: 0.7rem;
        padding: 5px 12px;
        border-radius: 20px;
        margin-left: 10px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .requirement-list li {
        margin-bottom: 10px;
        position: relative;
        padding-left: 25px;
        color: var(--text-muted);
        list-style: none;
    }
    .requirement-list li::before {
        content: "\F26A"; 
        font-family: "bootstrap-icons";
        color: var(--primary-green);
        position: absolute;
        left: 0; top: 2px;
    }

    /* === Tahap Rekrutmen === */
    .section-steps {
        background-color: var(--soft-green);
        padding: 80px 0;
    }
    .step-number {
        width: 60px; height: 60px;
        background: var(--primary-green);
        color: white;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800;
        margin: 0 auto 20px auto;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
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

    .modal-content .form-control {
        background-color: #ffffff !important;
        border: 1px solid #ced4da !important;
        color: #212529 !important;
    }

    .modal-header { border-bottom: 1px solid #f1f5f9; }

    @media (max-width: 768px) {
        .career-hero { min-height: 50vh; }
        .page-title { font-size: 2.2rem; }
    }
</style>

<!-- Hero Header Karir -->
<div class="career-hero">
    <div class="container position-relative z-3" data-aos="zoom-in">
        <h1 class="page-title">Karir</h1>
        <p class="lead fs-5 mb-4 fw-light text-white opacity-90" style="max-width: 700px; margin: 0 auto;">
            Tumbuh Bersama Kami Membangun Pertanian Masa Depan
        </p>
    </div>
</div>

<!-- Alasan Harus Bergabung -->
<div class="container py-5 my-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Budaya Kerja</span>
        <h2 class="fw-bold text-dark display-6">Mengapa Bergabung Bersama Kami?</h2>
        <div style="width: 60px; height: 4px; background: var(--primary-green); margin: 15px auto; border-radius: 2px;"></div>
    </div>

    <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="culture-box">
                <div class="culture-icon"><i class="bi bi-lightbulb"></i></div>
                <h5 class="fw-bold text-dark">Inovasi Tanpa Henti</h5>
                <p class="text-muted small">Kami menggunakan teknologi terbaru (IoT, AI) dalam pertanian. Ide segar Anda selalu dihargai.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="culture-box">
                <div class="culture-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <h5 class="fw-bold text-dark">Jenjang Karir Jelas</h5>
                <p class="text-muted small">Kami mendukung pertumbuhan profesional Anda melalui pelatihan, mentoring, dan promosi internal.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="culture-box">
                <div class="culture-icon"><i class="bi bi-heart"></i></div>
                <h5 class="fw-bold text-dark">Dampak Sosial Nyata</h5>
                <p class="text-muted small">Setiap pekerjaan Anda berkontribusi langsung pada kesejahteraan petani lokal dan ketahanan pangan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Alur Perekrutan -->
<div class="section-steps">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold text-dark display-6">Alur Perekrutan</h2>
            <p class="text-dark opacity-75">Proses mudah dan transparan untuk menjadi bagian dari kami.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="step-number">1</div>
                <h6 class="fw-bold text-dark">Kirim CV</h6>
                <p class="text-muted small">Kirim CV via Email</p>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="step-number">2</div>
                <h6 class="fw-bold text-dark">Interview</h6>
                <p class="text-muted small">Screening & Wawancara</p>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="300">
                <div class="step-number">3</div>
                <h6 class="fw-bold text-dark">Tes Teknis</h6>
                <p class="text-muted small">Uji Kompetensi</p>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="400">
                <div class="step-number"><i class="bi bi-check-lg"></i></div>
                <h6 class="fw-bold text-dark">Offering</h6>
                <p class="text-muted small">Onboarding</p>
            </div>
        </div>
    </div>
</div>

<!-- Posisi Karir yang tersedia -->
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Bergabunglah Sekarang</span>
                <h2 class="fw-bold text-dark display-6">Posisi Tersedia</h2>
            </div>

            <div class="accordion" id="accordionKarir">
                <?php if(!empty($careers)): ?>
                    <?php foreach($careers as $index => $c): ?>
                    <div class="accordion-item" data-aos="fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $c['id']; ?>">
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <span class="me-auto fw-bold"><?= $c['posisi']; ?></span>
                                    <span class="badge bg-success job-badge me-2"><?= $c['tipe']; ?></span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse<?= $c['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionKarir">
                            <div class="accordion-body">
                                <div class="row g-4">
                                    <div class="col-md-8">
                                        <h6 class="fw-bold text-dark">Deskripsi:</h6>
                                        <p class="small text-muted"><?= $c['deskripsi']; ?></p>
                                    </div>
                                    <div class="col-md-4 text-center border-start">
                                        <div class="p-3 bg-light rounded-4">
                                            <p class="mb-1 text-muted small">Batas Lamaran:</p>
                                            <p class="fw-bold text-danger mb-3"><?= date('d M Y', strtotime($c['batas_lamaran'])); ?></p>
                                            
                                            <button type="button" class="btn btn-success rounded-pill w-100 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalLamar<?= $c['id']; ?>">
                                                Lamar Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lamar Pekerjaan -->
<?php if(!empty($careers)): ?>
    <?php foreach($careers as $c): ?>
    <div class="modal fade" id="modalLamar<?= $c['id']; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $c['id']; ?>" aria-hidden="true" style="z-index: 9999;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <form action="/karir/submit" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-header pt-4 px-4 border-0">
                        <h5 class="modal-title fw-bold" id="modalLabel<?= $c['id']; ?>">Lamar: <span class="text-success"><?= $c['posisi']; ?></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">
                        <input type="hidden" name="career_id" value="<?= $c['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Email Aktif</label>
                            <input type="email" name="email" class="form-control" placeholder="contoh@mail.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Nomor WhatsApp</label>
                            <input type="number" name="telepon" class="form-control" placeholder="0812345xxx" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Unggah CV (PDF, Max 2MB)</label>
                            <input type="file" name="cv" class="form-control" accept=".pdf" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-4 px-4">
                        <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold py-2 shadow-sm">Kirim Lamaran Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    AOS.init({ once: true, offset: 50, duration: 800 });

    document.addEventListener("DOMContentLoaded", function() {
        // 1. Flashdata Sukses
        <?php if (session()->getFlashdata('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
                customClass: {
                    popup: 'rounded-4'
                }
            });
        <?php endif; ?>

        // 2. Flashdata Error
        <?php if (session()->getFlashdata('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error') ?>',
                confirmButtonColor: '#10b981',
                customClass: {
                    popup: 'rounded-4',
                    confirmButton: 'rounded-pill px-4'
                }
            });
        <?php endif; ?>
    });
</script>

<!-- Footer -->
<?= $this->endSection(); ?>