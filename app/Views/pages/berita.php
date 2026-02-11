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
    .news-hero {
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.85), rgba(16, 185, 129, 0.75)), url('/img/Berita.jpeg');
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

    /* === TICKER === */
    .ticker-wrap {
        width: 100%; overflow: hidden; background: var(--dark-green);
        color: white; padding: 10px 0; margin-top: 20px; border-radius: 10px;
    }
    .ticker { display: inline-block; white-space: nowrap; animation: ticker 40s linear infinite; }
    .ticker-item { display: inline-block; padding: 0 2rem; font-size: 0.85rem; }
    @keyframes ticker { 0% { transform: translateX(0); } 100% { transform: translateX(-100%); } }

    /* === NEWS CARD === */
    .news-card {
        border-radius: 20px; border: none; transition: all 0.3s ease;
        height: 100%; box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .news-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(16, 185, 129, 0.2); }
    .news-img-wrap { height: 200px; overflow: hidden; position: relative; border-radius: 20px 20px 0 0; }
    .news-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .news-date-float {
        position: absolute; top: 15px; right: 15px; background: white;
        padding: 5px 12px; border-radius: 10px; font-weight: 700; font-size: 0.7rem; color: var(--dark-green);
    }

    /* === SIDEBAR & WIDGETS === */
    .widget-box { background: white; padding: 25px; border-radius: 20px; margin-bottom: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.02); }
    .widget-title { font-weight: 700; margin-bottom: 20px; border-left: 4px solid var(--primary-green); padding-left: 15px; }
    
    .cat-list li { cursor: pointer; padding: 8px 0; border-bottom: 1px dashed #eee; transition: 0.3s; color: var(--text-dark); }
    .cat-list li:hover { color: var(--primary-green); padding-left: 10px; }
    
    /* STYLE UNTUK ELEMENT AKTIF */
    .cat-list li.active-cat { color: var(--primary-green) !important; font-weight: 700; padding-left: 10px; }
    
    .tag-btn { cursor: pointer; transition: 0.3s; font-size: 0.75rem; border: 1px solid #dee2e6 !important; }
    .tag-btn.active-tag {
        background-color: var(--primary-green) !important;
        color: white !important;
        border-color: var(--primary-green) !important;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }

    /* Animation */
    .fade-in-item { animation: fadeIn 0.5s ease forwards; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    
    .sticky-sidebar { position: sticky; top: 100px; }
</style>

<!-- Hero Header Berita -->
<div class="news-hero">
    <div class="container position-relative z-3" data-aos="zoom-in">
        <h1 class="page-title">Berita & Artikel</h1>
        <p class="lead opacity-90 text-white">Inovasi Pertanian & Info Perusahaan Terupdate</p>
    </div>
</div>

<!-- Pencarian Berita -->
<div class="container position-relative z-3">
    <div class="search-box-container" data-aos="fade-up">
        <div class="row g-3 justify-content-center">
            <div class="col-md-9">
                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                    <span class="input-group-text bg-light border-0 ps-3"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchInput" class="form-control form-control-lg bg-light border-0 shadow-none" placeholder="Cari judul atau isi berita...">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Menu Berita -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <h4 class="fw-bold mb-0">Artikel Terbaru</h4>
                    <button onclick="resetFilter()" id="resetBtn" class="btn btn-sm btn-outline-danger rounded-pill px-3" style="display:none;">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Hapus Filter
                    </button>
                </div>

                <div class="row g-4" id="newsContainer">
                    <?php if(!empty($news)): ?>
                        <?php foreach($news as $n): ?>
                            <div class="col-md-6 news-item" 
                                 data-category="<?= strtolower($n['kategori']); ?>" 
                                 data-tags="<?= strtolower($n['tags'] ?? ''); ?>"
                                 data-aos="fade-up">
                                <div class="card news-card">
                                    <div class="news-img-wrap">
                                        <img src="/img/news/<?= $n['foto']; ?>" alt="<?= $n['judul']; ?>" onerror="this.src='https://placehold.co/600x400?text=Arif+Agro+Farm'">
                                        <span class="news-date-float"><?= date('d M Y', strtotime($n['tanggal'])); ?></span>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <small class="text-success fw-bold text-uppercase"><?= $n['kategori']; ?></small>
                                        <h5 class="fw-bold mt-2 lh-base">
                                            <a href="<?= base_url('news/detail/'.$n['id']); ?>" class="text-decoration-none text-dark"><?= $n['judul']; ?></a>
                                        </h5>
                                        <p class="text-muted small mb-4"><?= substr(strip_tags($n['konten_singkat'] ?? $n['konten']), 0, 100); ?>...</p>
                                        <div class="mt-auto">
                                            <a href="<?= base_url('news/detail/'.$n['id']); ?>" class="btn btn-link text-success p-0 fw-bold text-decoration-none small">
                                                Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Maaf, berita belum tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div id="noResults" class="text-center py-5" style="display:none;">
                    <i class="bi bi-search display-1 text-muted opacity-25"></i>
                    <p class="mt-3 text-muted">Tidak ditemukan berita yang cocok.</p>
                </div>
            </div>

            <!-- Sidebar Pengumuman -->
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <div class="widget-box" style="border-left: 5px solid var(--accent-gold);">
                        <h5 class="widget-title">Pengumuman</h5>
                        <?php if(!empty($announcements)): ?>
                            <?php foreach($announcements as $a): ?>
                                <div class="mb-3 pb-2 border-bottom border-light">
                                    <small class="text-muted d-block small"><?= date('d M Y', strtotime($a['tanggal'])); ?></small>
                                    <a href="<?= base_url('pengumuman/detail/'.$a['id']); ?>" class="text-dark fw-bold text-decoration-none small hover-green">
                                        <?= $a['judul']; ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="small text-muted">Belum ada pengumuman.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Sidebar Kategori berita -->
                    <div class="widget-box">
                        <h5 class="widget-title">Kategori Berita</h5>
                        <ul class="list-unstyled cat-list mb-0">
                            <li onclick="filterByCategory('edukasi', this)">Edukasi</li>
                            <li onclick="filterByCategory('kegiatan', this)">Kegiatan Perusahaan</li>
                            <li onclick="filterByCategory('info-pasar', this)">Info Pasar</li>
                            <li onclick="filterByCategory('tips', this)">Tips & Trik</li>
                        </ul>
                    </div>

                    <!-- Sidebar Tag Berita terpopuler -->
                    <div class="widget-box">
                        <h5 class="widget-title">Tag Populer</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <?php 
                            $tags = ['hidroponik', 'organik', 'iot', 'tips', 'bisnis', 'modern', 'edukasi', 'perusahaan', 'arif agro farm', 'info'];
                            foreach($tags as $t): ?>
                                <span onclick="filterByTag('<?= $t ?>', this)" class="badge bg-light text-dark p-2 tag-btn rounded-pill"><?= ucfirst($t) ?></span>
                            <?php endforeach; ?>
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
    AOS.init({ once: true });

    const newsItems = document.querySelectorAll('.news-item');
    const searchInput = document.getElementById('searchInput');
    const resetBtn = document.getElementById('resetBtn');
    const noResults = document.getElementById('noResults');

    // 1. Pencarian Real-time
    searchInput.addEventListener('input', function() {
        resetVisuals();
        const keyword = this.value.toLowerCase();
        let visibleCount = 0;

        newsItems.forEach(item => {
            const title = item.querySelector('h5').innerText.toLowerCase();
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
        newsItems.forEach(item => {
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

    // 3. Filter Tag
    function filterByTag(tag, element) {
        resetVisuals();
        element.classList.add('active-tag');
        
        let visibleCount = 0;
        newsItems.forEach(item => {
            const tags = item.getAttribute('data-tags');
            if(tags.includes(tag.toLowerCase())) {
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

    // 4. Reset Visual
    function resetVisuals() {
        document.querySelectorAll('.tag-btn').forEach(b => b.classList.remove('active-tag'));
        document.querySelectorAll('.cat-list li').forEach(l => l.classList.remove('active-cat'));
    }

    // 5. Reset Semua Filter
    function resetFilter() {
        searchInput.value = '';
        resetVisuals();
        newsItems.forEach(item => {
            item.style.display = 'block';
            item.classList.remove('fade-in-item');
        });
        noResults.style.display = 'none';
        resetBtn.style.display = 'none';
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>