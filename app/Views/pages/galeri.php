<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- CSS -->
<style>
    :root {
        --primary-green: #10b981;
        --dark-green: #064e3b;
        --soft-green: #d1fae5;
        --bg-off-white: #f8fafc;
        --text-dark: #1e293b;
        --accent-gold: #f59e0b;
    }

    body { font-family: 'Poppins', sans-serif; background-color: var(--bg-off-white); }

    /* === HERO HEADER === */
    .galeri-hero {
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.85), rgba(16, 185, 129, 0.75)), url('/img/Tentang_Kami.jpeg');
        background-size: cover; background-position: center; background-attachment: fixed;
        min-height: 100vh; display: flex; align-items: center; justify-content: center;
        text-align: center; color: white; margin-top: -80px; padding-top: 80px; position: relative;
    }

    .page-title { font-weight: 800; text-transform: uppercase; font-size: 3.5rem; text-shadow: 0 10px 30px rgba(0,0,0,0.3); }

    /* === SEARCH BOX === */
    .search-box-container {
        background: white; padding: 30px; border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.08); margin-top: -60px;
        position: relative; z-index: 10; border: 1px solid rgba(0,0,0,0.05);
    }

    /* === GALLERY CARD === */
    .galeri-item { cursor: pointer; position: relative; overflow: hidden; border-radius: 20px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    
    .galeri-img-wrap { aspect-ratio: 4/3; overflow: hidden; border-radius: 20px; }
    .galeri-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: all 0.6s ease; }

    .galeri-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(6, 78, 59, 0.9), transparent);
        display: flex; flex-direction: column; justify-content: flex-end;
        padding: 25px; opacity: 0; transition: all 0.4s ease;
    }

    .galeri-item:hover { transform: translateY(-10px); }
    .galeri-item:hover .galeri-overlay { opacity: 1; }
    .galeri-item:hover img { transform: scale(1.15); }

    .zoom-icon {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        font-size: 2.5rem; color: white; opacity: 0; transition: 0.3s;
    }
    .galeri-item:hover .zoom-icon { opacity: 1; transform: translate(-50%, -50%) scale(1.1); }

    /* === SIDEBAR & WIDGETS === */
    .widget-box { background: white; padding: 25px; border-radius: 20px; margin-bottom: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.02); }
    .widget-title { font-weight: 700; margin-bottom: 20px; border-left: 4px solid var(--primary-green); padding-left: 15px; }
    
    .cat-list li { cursor: pointer; padding: 10px 0; border-bottom: 1px dashed #eee; transition: 0.3s; color: var(--text-dark); display: flex; justify-content: space-between; }
    .cat-list li:hover { color: var(--primary-green); padding-left: 10px; }
    .cat-list li.active-cat { color: var(--primary-green) !important; font-weight: 700; padding-left: 10px; }

    /* Animation */
    .fade-in-item { animation: fadeIn 0.5s ease forwards; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    
    .sticky-sidebar { position: sticky; top: 100px; }

    /* Custom Scrollbar for Modal */
    .modal-content { border-radius: 25px; overflow: hidden; }
</style>

<!-- Hero Header Galeri -->
<div class="galeri-hero">
    <div class="container position-relative z-3" data-aos="zoom-in">
        <h1 class="page-title">Galeri Foto</h1>
        <p class="lead opacity-90 text-white">Dokumentasi Aktivitas & Inovasi PT. Arif Agro Farm</p>
    </div>
</div>

<!-- Pencarian Galeri -->
<div class="container position-relative z-3">
    <div class="search-box-container" data-aos="fade-up">
        <div class="row g-3 justify-content-center">
            <div class="col-md-9">
                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                    <span class="input-group-text bg-light border-0 ps-3"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchInput" class="form-control form-control-lg bg-light border-0 shadow-none" placeholder="Cari judul atau kategori foto...">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menampilkan Semua Galeri -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <h4 class="fw-bold mb-0">Semua Dokumentasi</h4>
                    <button onclick="resetFilter()" id="resetBtn" class="btn btn-sm btn-outline-danger rounded-pill px-3" style="display:none;">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Hapus Filter
                    </button>
                </div>

                <div class="row g-4" id="galeriContainer">
                    <?php if(!empty($galeri)): ?>
                        <?php foreach($galeri as $g): ?>
                            <div class="col-md-6 photo-item" 
                                 data-category="<?= strtolower($g['kategori']); ?>" 
                                 data-title="<?= strtolower($g['judul']); ?>"
                                 data-aos="fade-up">
                                <div class="galeri-item" data-bs-toggle="modal" data-bs-target="#imageModal" 
                                     data-img="/img/galeri/<?= $g['gambar']; ?>" 
                                     data-title="<?= $g['judul']; ?>"
                                     data-cat="<?= ucfirst($g['kategori']); ?>">
                                    <div class="galeri-img-wrap shadow-sm">
                                        <img src="/img/galeri/<?= $g['gambar']; ?>" alt="<?= $g['judul']; ?>" loading="lazy">
                                        <div class="zoom-icon"><i class="bi bi-plus-circle-fill"></i></div>
                                        <div class="galeri-overlay">
                                            <span class="badge bg-accent-gold text-white mb-2 rounded-pill" style="width: fit-content; background-color: var(--accent-gold);"><?= ucfirst($g['kategori']); ?></span>
                                            <h5 class="text-white fw-bold mb-0"><?= $g['judul']; ?></h5>
                                            <small class="text-white-50"><?= date('d M Y', strtotime($g['created_at'])); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-image text-muted opacity-25" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-3">Belum ada foto yang tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div id="noResults" class="text-center py-5" style="display:none;">
                    <i class="bi bi-camera display-1 text-muted opacity-25"></i>
                    <p class="mt-3 text-muted">Foto tidak ditemukan.</p>
                </div>
            </div>

            <!-- Sidebar Kategori Galeri -->
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <div class="widget-box" style="border-left: 5px solid var(--accent-gold);">
                        <h5 class="widget-title">Kategori Galeri</h5>
                        <ul class="list-unstyled cat-list mb-0">
                            <li onclick="filterByCategory('kegiatan', this)">
                                <span>Kegiatan</span>
                                <i class="bi bi-chevron-right small"></i>
                            </li>
                            <li onclick="filterByCategory('produk', this)">
                                <span>Produk Unggulan</span>
                                <i class="bi bi-chevron-right small"></i>
                            </li>
                            <li onclick="filterByCategory('teknologi', this)">
                                <span>Teknologi Tani</span>
                                <i class="bi bi-chevron-right small"></i>
                            </li>
                        </ul>
                    </div>

                    <div class="widget-box">
                        <h5 class="widget-title">Info Cepat</h5>
                        <p class="small text-muted mb-0">Klik pada gambar untuk melihat tampilan penuh dokumentasi aktivitas lapangan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ketika Galeri di Klik -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 100;"></button>
                <img src="" id="modalImg" class="img-fluid rounded shadow-lg w-100" alt="Preview">
                <div class="text-white text-center mt-3 p-3" style="background: rgba(0,0,0,0.6); border-radius: 15px;">
                    <h4 id="modalTitle" class="fw-bold mb-1"></h4>
                    <span id="modalCat" class="badge bg-success"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true });

    const photoItems = document.querySelectorAll('.photo-item');
    const searchInput = document.getElementById('searchInput');
    const resetBtn = document.getElementById('resetBtn');
    const noResults = document.getElementById('noResults');

    // 1. Pencarian Real-time
    searchInput.addEventListener('input', function() {
        resetVisuals();
        const keyword = this.value.toLowerCase();
        let visibleCount = 0;

        photoItems.forEach(item => {
            const title = item.getAttribute('data-title');
            const category = item.getAttribute('data-category');
            if(title.includes(keyword) || category.includes(keyword)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        resetBtn.style.display = keyword.length > 0 ? 'inline-block' : 'none';
    });

    // 2. Filter Kategori
    function filterByCategory(cat, element) {
        resetVisuals();
        element.classList.add('active-cat');
        
        let visibleCount = 0;
        photoItems.forEach(item => {
            if(item.getAttribute('data-category') === cat.toLowerCase()) {
                item.style.display = 'block';
                item.classList.add('fade-in-item');
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        resetBtn.style.display = 'inline-block';
    }

    // 3. Reset Visuals
    function resetVisuals() {
        document.querySelectorAll('.cat-list li').forEach(l => l.classList.remove('active-cat'));
    }

    // 4. Reset Semua Filter
    function resetFilter() {
        searchInput.value = '';
        resetVisuals();
        photoItems.forEach(item => {
            item.style.display = 'block';
            item.classList.remove('fade-in-item');
        });
        noResults.style.display = 'none';
        resetBtn.style.display = 'none';
    }

    // 5. Modal Lightbox Logic
    const imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const imgSrc = button.getAttribute('data-img');
        const imgTitle = button.getAttribute('data-title');
        const imgCat = button.getAttribute('data-cat');
        
        const modalImg = imageModal.querySelector('#modalImg');
        const modalTitle = imageModal.querySelector('#modalTitle');
        const modalCat = imageModal.querySelector('#modalCat');
        
        modalImg.src = imgSrc;
        modalTitle.textContent = imgTitle;
        modalCat.textContent = imgCat;
    });
</script>

<!-- Footer -->
<?= $this->endSection(); ?>