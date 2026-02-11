<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<!-- CSS -->
<style>
    .order-hero {
        background: linear-gradient(135deg, rgba(15, 81, 50, 0.9), rgba(25, 135, 84, 0.8)), url('/img/Produk.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 80vh; 
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: -65px; 
        padding-top: 150px;
        padding-bottom: 100px;
        position: relative;
    }

    .order-title {
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        text-shadow: 0 5px 15px rgba(0,0,0,0.3);
        font-size: 2.5rem;
    }

    .custom-shape-divider-bottom {
        position: absolute; bottom: 0; left: 0; width: 100%; overflow: hidden; line-height: 0; transform: rotate(180deg); z-index: 2;
    }

    .custom-shape-divider-bottom svg { position: relative; display: block; width: calc(100% + 1.3px); height: 60px; }
    .shape-fill { fill: var(--bg-off-white); } 

    .order-card-container {
        margin-top: 40px;
        position: relative;
        z-index: 10;
    }

    .form-control:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.25);
    }
    
    .hover-scale:hover {
        transform: translateY(-2px);
        transition: 0.2s;
    }
</style>

<!-- Hero Header Konfirmasi Pesanan -->
<div class="order-hero">
    <div class="container position-relative z-3">
        <h1 class="order-title">Konfirmasi Pesanan</h1>
        <p class="lead fw-light text-white opacity-90 fs-6">
            Lengkapi data diri Anda untuk menyelesaikan pemesanan.
        </p>
    </div>
</div>

<!-- Card Konfirmasi Pemesanan -->
<div class="container pb-5 order-card-container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <a href="/produk" class="text-decoration-none text-muted mb-3 d-inline-block fw-bold small">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Katalog
            </a>

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="row g-0">
                    
                    <div class="col-md-5 bg-light d-none d-md-block position-relative">
                        <img src="/img/products/<?= $product['foto']; ?>" 
                             class="w-100 h-100 object-fit-cover" 
                             style="min-height: 400px;"
                             onerror="this.src='https://source.unsplash.com/600x800/?agriculture'">
                        
                        <div class="position-absolute bottom-0 start-0 w-100 p-4" 
                             style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                            <h4 class="text-white fw-bold mb-1"><?= $product['nama_produk']; ?></h4>
                            <p class="text-white-50 mb-0 small"><?= $product['harga_label']; ?></p>
                            <span class="badge bg-success bg-opacity-75 mt-2 text-white border border-light"><?= ucfirst($product['kategori']); ?></span>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="p-4 p-md-5">
                            <h4 class="fw-bold text-success mb-2">Detail Pengiriman</h4>
                            <p class="text-muted mb-4 small">Mohon isi data dengan benar agar pesanan dapat diproses.</p>

                            <?php if(session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger py-2 small rounded-3 border-0 shadow-sm mb-4">
                                    <i class="bi bi-exclamation-circle me-2"></i> <?= session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="/pesan/kirim" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">

                                <div class="d-md-none mb-4 p-3 bg-light rounded-3 border d-flex align-items-center gap-3">
                                    <img src="/img/products/<?= $product['foto']; ?>" width="60" height="60" class="rounded object-fit-cover">
                                    <div>
                                        <div class="fw-bold text-dark"><?= $product['nama_produk']; ?></div>
                                        <div class="text-success small fw-bold"><?= $product['harga_label']; ?></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                                    <input type="text" name="nama_pemesan" class="form-control bg-light border-0" required placeholder="Contoh: Budi Santoso">
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label small fw-bold text-muted text-uppercase">No. WhatsApp</label>
                                        <input type="number" name="no_hp" class="form-control bg-light border-0" required placeholder="08...">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control bg-light border-0" required min="1" value="1">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Alamat Lengkap</label>
                                    <textarea name="alamat" class="form-control bg-light border-0" rows="3" required placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan..."></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Catatan (Opsional)</label>
                                    <textarea name="catatan" class="form-control bg-light border-0" rows="2" placeholder="Contoh: Titip di pos satpam..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold py-3 shadow hover-scale">
                                    Kirim Pesanan Sekarang <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?= $this->endSection(); ?>