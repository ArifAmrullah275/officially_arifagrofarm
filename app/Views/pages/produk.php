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
    }

    body { 
        font-family: 'Poppins', sans-serif; 
        color: var(--text-dark); 
        background-color: var(--bg-off-white);
        overflow-x: hidden;
    }

    /* === HERO HEADER === */
    .product-hero {
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.85), rgba(16, 185, 129, 0.75)), url('img/Produk.jpg');
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
        padding-bottom: 120px;
        position: relative;
    }

    .page-title {
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1rem;
        text-shadow: 0 10px 30px rgba(0,0,0,0.3);
        font-size: 3.5rem;
    }

    /* === FILTER BUTTONS === */
    .filter-btn {
        border: 2px solid var(--primary-green);
        color: var(--primary-green);
        background: white;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 600;
        margin: 5px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover, .filter-btn.active {
        background: var(--primary-green);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
    }

    /* === PRODUCT CARD === */
    .product-card {
        border: none;
        border-radius: 20px;
        background: white;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
    }

    .product-img-box {
        height: 240px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
    }

    .product-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .product-card:hover .product-img-box img {
        transform: scale(1.1);
    }

    .category-badge {
        position: absolute;
        top: 15px; left: 15px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        color: var(--dark-green);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        z-index: 2;
    }

    .card-body { 
        padding: 1.5rem; 
        text-align: left; 
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-title { font-size: 1.15rem; font-weight: 700; color: var(--text-dark); }
    
    .card-desc {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-bottom: auto; 
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

    /* === KEUNGGULAN SECTION === */
    .section-features {
        background-color: var(--soft-green);
        position: relative;
        padding-top: 100px;
        padding-bottom: 80px;
    }

    .feature-box {
        padding: 2rem;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: 0.3s;
        height: 100%;
        border: 1px solid rgba(255,255,255,0.6);
    }

    .feature-icon {
        width: 60px; height: 60px;
        background: var(--soft-green);
        color: var(--primary-green);
        border-radius: 15px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 1.5rem auto;
    }

    /* Call to Action Card */
    .cta-card {
        background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
        border: none;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(6, 78, 59, 0.3);
    }

    .empty-state-message {
        display: none;
        width: 100%;
        text-align: center;
        padding: 60px 0;
    }

    /* MODAL STYLE */
    .modal-content { border-radius: 25px; border: none; overflow: hidden; }
    .modal-header { border-bottom: none; padding: 25px 30px 10px; }
    .modal-body { padding: 0 30px 30px; }
    .modal-img { border-radius: 15px; width: 100%; object-fit: cover; max-height: 400px; margin-bottom: 20px; }

    @media (max-width: 768px) {
        .product-hero { min-height: 50vh; }
        .page-title { font-size: 2.5rem; }
    }
</style>

<!-- Hero Section Produk -->
<div class="product-hero">
    <div class="container position-relative z-3" data-aos="zoom-in" data-aos-duration="1000">
        <h1 class="display-3 page-title">Produk Kami</h1>
        <p class="lead fs-5 mb-4 fw-light text-white opacity-90" style="max-width: 700px; margin: 0 auto;">
            Kualitas Terbaik Langsung dari Kebun ke Tangan Anda
        </p>
    </div>
</div>

<!-- Produk -->
<div class="container py-5 my-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="section-label">Pilihan Terbaik</span>
        <h2 class="fw-bold mb-4 text-dark display-6">Kategori Produk</h2>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="sayuran">Sayuran</button>
            <button class="filter-btn" data-filter="buah">Buah</button>
            <button class="filter-btn" data-filter="bibit">Bibit</button>
            <button class="filter-btn" data-filter="alsintan">Alsintan</button>
        </div>
    </div>

    <!-- Kategori Produk -->
    <div class="row g-4 product-list">
        <?php if(!empty($products)): ?>
            <?php foreach($products as $p): ?>
            <div class="col-lg-4 col-md-6 filter-item <?= $p['kategori']; ?>" 
                data-category="<?= $p['kategori']; ?>" 
                data-aos="fade-up">
                <div class="product-card">
                    <div class="product-img-box" 
                         onclick="showDetail('<?= $p['nama_produk']; ?>', '<?= $p['deskripsi']; ?>', '/img/products/<?= $p['foto']; ?>', '<?= $p['harga_label']; ?>', '<?= $p['id']; ?>')">
                        <img src="/img/products/<?= $p['foto']; ?>" 
                             alt="<?= $p['nama_produk']; ?>" 
                             onerror="this.src='https://placehold.co/600x400?text=Produk+Kami'">
                        <span class="category-badge"><?= ucfirst($p['kategori']); ?></span>
                    </div>
                    
                    <!-- Card Produk -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0"><?= $p['nama_produk']; ?></h5>
                            <?php if(!empty($p['harga_label'])): ?>
                                <span class="text-success fw-bold small bg-light px-2 py-1 rounded"><?= $p['harga_label']; ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="card-desc mb-4"><?= $p['deskripsi']; ?></p>
                        <a href="/pesan/produk/<?= $p['id']; ?>" class="btn btn-success rounded-pill px-4 fw-bold w-100 shadow-sm">
                            <i class="bi bi-cart-plus me-2"></i> Pesan Produk
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div id="empty-state" class="empty-state-message">
            <h5 class="fw-bold text-muted">Produk kategori ini belum tersedia.</h5>
        </div>
    </div>
</div>

<!-- Produk ketika di Klik -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="fw-bold text-dark mb-0" id="modalTitle"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="modalImage" src="" class="modal-img shadow-sm">
                    </div>
                    <div class="col-md-6 d-flex flex-column">
                        <h5 class="section-label mb-1">Deskripsi Produk</h5>
                        <p id="modalDesc" class="text-muted mb-4" style="line-height: 1.8;"></p>
                        
                        <div class="mt-auto bg-light p-3 rounded-4 mb-4">
                            <span class="text-muted small d-block">Harga / Satuan</span>
                            <h3 class="fw-bold text-success mb-0" id="modalPrice"></h3>
                        </div>

                        <a href="#" id="modalOrderBtn" class="btn btn-success btn-lg rounded-pill fw-bold w-100 shadow">
                            <i class="bi bi-cart-plus me-2"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jaminan Kualitas Produk -->
<div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Kenapa Produk Kami?</span>
            <h2 class="fw-bold text-dark display-6">Jaminan Kualitas</h2>
            <div style="width: 60px; height: 4px; background: var(--primary-green); margin: 15px auto; border-radius: 2px;"></div>
            <p class="text-dark opacity-75">Kami menjamin kualitas dari benih hingga sampai ke tangan Anda dengan standar tinggi.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="feature-box">
                    <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
                    <h5 class="fw-bold text-dark">100% Kualitas Terjamin</h5>
                    <p class="text-muted small mb-0">Melalui proses sortasi ketat (Quality Control) sebelum dikemas dan dikirim ke pelanggan.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="feature-box">
                    <div class="feature-icon"><i class="bi bi-droplet-half"></i></div>
                    <h5 class="fw-bold text-dark">Bebas Pestisida</h5>
                    <p class="text-muted small mb-0">Dibudidayakan di lingkungan greenhouse yang terkontrol, higienis, dan ramah lingkungan.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="feature-box">
                    <div class="feature-icon"><i class="bi bi-truck"></i></div>
                    <h5 class="fw-bold text-dark">Panen Hari Ini, Kirim Hari Ini</h5>
                    <p class="text-muted small mb-0">Menjamin kesegaran produk tetap terjaga maksimal hingga sampai di dapur Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action produk -->
<div class="container py-5 my-5">
    <div class="cta-card text-white p-5 text-center position-relative" data-aos="zoom-in">
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 20px 20px; opacity: 0.5;"></div>
        <div class="position-relative z-1">
            <h2 class="fw-bold mb-3 display-5">Butuh Suplai Rutin?</h2>
            <p class="lead mb-5 opacity-90 col-lg-8 mx-auto">Dapatkan penawaran harga khusus untuk pembelian rutin restoran, hotel, atau toko Anda (B2B).</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="/kontak" class="btn btn-light text-success fw-bold rounded-pill px-5 py-3 shadow-lg hover-scale">Hubungi Tim Sales</a>
                <a href="https://wa.me/6283827914570?text=Halo%20Admin%20Arif%20Agro%20Farm,%20saya%20tertarik%20untuk%20kerjasama%20suplai%20produk." target="_blank" class="btn btn-outline-light rounded-pill px-5 py-3 fw-bold border-2"><i class="bi bi-whatsapp me-2"></i> WhatsApp</a>
            </div>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, offset: 50, duration: 800 });

    // MENAMPILKAN MODAL
    function showDetail(nama, deskripsi, foto, harga, id) {
        document.getElementById('modalTitle').innerText = nama;
        document.getElementById('modalDesc').innerText = deskripsi;
        document.getElementById('modalImage').src = foto;
        document.getElementById('modalPrice').innerText = harga ? harga : 'Hubungi Kami';
        document.getElementById('modalOrderBtn').href = '/pesan/produk/' + id;
        
        var myModal = new bootstrap.Modal(document.getElementById('productDetailModal'));
        myModal.show();
    }

    // FILTER KATEGORI PRODUK
    document.addEventListener("DOMContentLoaded", function() {
        const filterBtns = document.querySelectorAll(".filter-btn");
        const productItems = document.querySelectorAll(".filter-item");
        const emptyState = document.getElementById("empty-state");

        function applyFilter(filterValue) {
            let visibleItemsCount = 0;
            productItems.forEach((item) => {
                if (filterValue === "all" || item.classList.contains(filterValue)) {
                    item.style.display = "block";
                    visibleItemsCount++;
                } else {
                    item.style.display = "none";
                }
            });
            emptyState.style.display = (visibleItemsCount === 0) ? "block" : "none";
            AOS.refresh();
        }

        filterBtns.forEach((btn) => {
            btn.addEventListener("click", function() {
                filterBtns.forEach((b) => b.classList.remove("active"));
                this.classList.add("active");
                applyFilter(this.getAttribute("data-filter"));
            });
        });
        applyFilter("all");
    });
</script>

<!-- Footer -->
<?= $this->endSection(); ?>