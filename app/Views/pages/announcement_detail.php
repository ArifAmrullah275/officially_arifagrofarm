<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<!-- CSS -->
<style>
    .ann-header {
        background: var(--dark-green);
        padding: 220px 0 100px 0; 
        color: white;
        margin-top: -80px;
        position: relative;
    }
    
    .ann-content {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        line-height: 1.8;
    }

    @media (max-width: 768px) {
        .ann-header {
            padding: 180px 0 70px 0;
        }
    }
</style>

<!-- Hero Section detail Pengumuman -->
<div class="ann-header">
    <div class="container text-center">
        <span class="badge bg-warning text-dark mb-3"><i class="bi bi-megaphone-fill"></i> PENGUMUMAN</span>
        <h1 class="fw-bold"><?= $ann['judul'] ?></h1>
        <p class="opacity-75"><i class="bi bi-calendar-event"></i> Diterbitkan pada: <?= date('d M Y', strtotime($ann['tanggal'])) ?></p>
    </div>
</div>

<!-- Content Detail Pengumuman -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="ann-content">
                <div class="fs-5 text-dark">
                    <?= nl2br($ann['judul']) ?> 
                </div>
                
                <hr class="my-4">
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/berita" class="btn btn-outline-success rounded-pill px-4">
                        <i class="bi bi-arrow-left"></i> Kembali ke Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?= $this->endSection(); ?>