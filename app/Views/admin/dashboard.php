<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Footer -->
<?= $this->section('content'); ?>

<div class="mb-4 animate__animated animate__fadeIn">
    <h3 class="fw-bold text-dark mb-1">
        Selamat Datang, <span class="text-success"><?= session()->get('nama'); ?>!</span> 👋
    </h3>
    <p class="text-muted small">Ini adalah ringkasan aktivitas website <span class="fw-bold">Arif Agro Farm</span> hari ini.</p>
</div>

<div class="row g-4 mb-5">
    
    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm card-stat h-100 overflow-hidden">
            <div class="card-body p-4 position-relative bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-4">
                        <i class="bi bi-envelope-fill fs-3"></i>
                    </div>
                    <div class="text-end">
                        <h2 class="fw-bold text-dark mb-0"><?= $pesan_baru; ?></h2>
                        <h6 class="text-muted text-uppercase x-small fw-bold mb-0">Pesan Baru</h6>
                    </div>
                </div>
                <a href="/admin/inbox" class="btn btn-sm btn-outline-danger w-100 rounded-pill fw-bold stretched-link">
                    Lihat Inbox <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm card-stat h-100 overflow-hidden">
            <div class="card-body p-4 position-relative bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-4">
                        <i class="bi bi-box-seam-fill fs-3"></i>
                    </div>
                    <div class="text-end">
                        <h2 class="fw-bold text-dark mb-0"><?= $total_produk; ?></h2>
                        <h6 class="text-muted text-uppercase x-small fw-bold mb-0">Total Produk</h6>
                    </div>
                </div>
                <a href="/admin/products" class="btn btn-sm btn-outline-success w-100 rounded-pill fw-bold stretched-link">
                    Kelola Produk <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm card-stat h-100 overflow-hidden">
            <div class="card-body p-4 position-relative bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-4">
                        <i class="bi bi-newspaper fs-3"></i>
                    </div>
                    <div class="text-end">
                        <h2 class="fw-bold text-dark mb-0"><?= $total_berita; ?></h2>
                        <h6 class="text-muted text-uppercase x-small fw-bold mb-0">Artikel</h6>
                    </div>
                </div>
                <a href="/admin/news" class="btn btn-sm btn-outline-warning w-100 rounded-pill fw-bold stretched-link text-dark">
                    Tulis Berita <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm card-stat h-100 overflow-hidden">
            <div class="card-body p-4 position-relative bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-info bg-opacity-10 text-info p-3 rounded-4">
                        <i class="bi bi-briefcase-fill fs-3"></i>
                    </div>
                    <div class="text-end">
                        <h2 class="fw-bold text-dark mb-0"><?= $total_loker; ?></h2>
                        <h6 class="text-muted text-uppercase x-small fw-bold mb-0">Loker Aktif</h6>
                    </div>
                </div>
                <a href="/admin/application" class="btn btn-sm btn-outline-info w-100 rounded-pill fw-bold stretched-link">
                    Cek Pelamar <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 h-100 rounded-4">
            <h5 class="fw-bold text-dark mb-4 d-flex align-items-center">
                <i class="bi bi-lightning-charge-fill text-warning me-2"></i> Aksi Cepat
            </h5>
            
            <div class="d-grid gap-3">
                <a href="/admin/products" class="btn btn-light text-start p-3 rounded-4 border-start border-success border-4 shadow-sm hover-move">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-plus-circle-fill text-success fs-4 me-3"></i>
                        <div>
                            <div class="fw-bold text-dark">Tambah Produk</div>
                            <small class="text-muted">Katalog baru</small>
                        </div>
                    </div>
                </a>

                <a href="/admin/news" class="btn btn-light text-start p-3 rounded-4 border-start border-warning border-4 shadow-sm hover-move">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-pencil-fill text-warning fs-4 me-3"></i>
                        <div>
                            <div class="fw-bold text-dark">Tulis Artikel</div>
                            <small class="text-muted">Info terbaru</small>
                        </div>
                    </div>
                </a>

                <a href="/admin/about" class="btn btn-light text-start p-3 rounded-4 border-start border-primary border-4 shadow-sm hover-move">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-building-fill text-primary fs-4 me-3"></i>
                        <div>
                            <div class="fw-bold text-dark">Edit Profil</div>
                            <small class="text-muted">Visi & Misi</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0">Pesan Terbaru</h5>
                <a href="/admin/inbox" class="btn btn-outline-success btn-sm rounded-pill px-3 fw-bold">
                    Lihat Semua <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-uppercase x-small fw-bold text-muted">
                            <th class="ps-4 py-3">Nama Pengirim</th>
                            <th>Subjek</th>
                            <th>Waktu</th>
                            <th class="text-end pe-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($recent_msg)): ?>
                            <?php foreach($recent_msg as $m): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= $m['nama']; ?></div>
                                </td>
                                <td>
                                    <span class="text-muted text-truncate d-inline-block" style="max-width: 180px;">
                                        <?= $m['subjek']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-secondary border rounded-pill">
                                        <i class="bi bi-clock me-1"></i> <?= date('d M, H:i', strtotime($m['created_at'])); ?>
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <?php if($m['status'] == 'unread'): ?>
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Baru</span>
                                    <?php elseif($m['status'] == 'replied'): ?>
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Dibalas</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Dibaca</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25 mb-3" alt="">
                                    <p class="text-muted mb-0">Belum ada pesan masuk hari ini.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .x-small { font-size: 0.75rem; }
    
    /* Animasi Kartu Statistik */
    .card-stat {
        transition: all 0.3s ease;
        border-bottom: 0px solid transparent !important;
    }
    .card-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    /* Efek Hover Tombol Aksi */
    .hover-move {
        transition: all 0.3s ease;
        border: 1px solid transparent !important;
    }
    .hover-move:hover {
        transform: translateX(8px);
        background-color: #fff !important;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08) !important;
    }

    /* Border Radius Custom */
    .rounded-4 { border-radius: 1.2rem !important; }
    
    /* Animasi Awal */
    .animate__fadeIn {
        animation-duration: 0.8s;
    }

    .btn-soft-success {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: none;
    }

    .btn-soft-success:hover {
        background-color: #2e7d32;
        color: #ffffff;
    }
</style>

<!-- Footer -->
<?= $this->endSection(); ?>