<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<!-- CSS -->
<style>
    .detail-hero {
        background: linear-gradient(rgba(6, 78, 59, 0.7), rgba(6, 78, 59, 0.7)), url('/img/news/<?= $news['foto'] ?>');
        background-size: cover; background-position: center;
        padding: 150px 0 100px 0; color: white; margin-top: -80px;
    }

    .content-body {
        line-height: 1.8; color: #334155; 
        font-size: 1.05rem;
    }

    .content-body img {
        max-width: 100%;
        border-radius: 15px;
        margin: 20px 0;
    }
</style>

<!-- Hero Header Detail Berita -->
<div class="detail-hero">
    <div class="container text-center">
        <span class="badge bg-success mb-3 text-uppercase"><?= $news['kategori'] ?></span>
        <h1 class="fw-bold display-5"><?= $news['judul'] ?></h1>
        <p class="opacity-75"><i class="bi bi-calendar3 me-2"></i> <?= date('d M Y', strtotime($news['tanggal'])) ?> | Oleh Admin</p>
    </div>
</div>

<!-- Konten Berita -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                <img src="/img/news/<?= $news['foto'] ?>" class="img-fluid rounded-4 mb-4 shadow-sm" alt="<?= $news['judul'] ?>">
                
                <div class="content-body">
                    <?= nl2br($news['konten'] ?? $news['konten_singkat']) ?>
                </div>
                
                <hr class="my-5">
                <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold">Tags:</span>
                    <?php 
                    $tags = explode(',', $news['tags']);
                    foreach($tags as $t): ?>
                        <span class="badge bg-light text-success border">#<?= trim($t) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Button kembali Ke menu berita -->
            <div class="mt-4">
                <a href="/berita" class="btn btn-outline-success rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Berita
                </a>
            </div>
        </div>

        <!-- Sidebar Pengumuman -->
        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 100px;">
                <h5 class="fw-bold mb-4 border-start border-success border-4 ps-3">Pengumuman Terbaru</h5>
                <?php foreach($announcements as $a): ?>
                    <div class="mb-3 pb-3 border-bottom border-light">
                        <small class="text-muted d-block"><?= date('d M Y', strtotime($a['tanggal'])); ?></small>
                        <a href="#" class="text-dark fw-bold text-decoration-none small"><?= $a['judul']; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?= $this->endSection(); ?>