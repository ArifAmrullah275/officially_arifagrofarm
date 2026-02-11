<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<!-- CSS -->
<style>
    :root {
        --primary-green: #10b981;
        --dark-green: #064e3b;
        --bg-off-white: #f8fafc;
        --text-dark: #1e293b;
    }
    body { font-family: 'Poppins', sans-serif; background-color: var(--bg-off-white); }
    
    /* Hero Header */
    .team-header {
        background: var(--dark-green);
        padding: 120px 0 60px 0;
        color: white;
        text-align: center;
        margin-bottom: 50px;
    }

    /* Card Style */
    .team-card-modern {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.4s;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .team-card-modern:hover { transform: translateY(-10px); }
    
    .team-img-wrap {
        height: 300px;
        background: #f1f5f9;
        position: relative;
        overflow: hidden;
    }
    .team-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    
    .social-overlay {
        position: absolute; bottom: 15px; left: 50%;
        transform: translateX(-50%) translateY(50px);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(5px);
        padding: 8px 15px;
        border-radius: 50px;
        display: flex; gap: 10px;
        transition: 0.4s;
        opacity: 0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .team-card-modern:hover .social-overlay { transform: translateX(-50%) translateY(0); opacity: 1; }

    /* IKON SOSMED */
    .team-social-link { 
        color: var(--dark-green); 
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e2e8f0;
        border-radius: 50%;
        font-size: 1.1rem; 
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .team-social-link:hover { 
        background-color: var(--primary-green);
        color: white; 
        transform: scale(1.1); 
    }
    
    .team-info { padding: 20px; text-align: center; }
</style>

<!-- Tim Manajemen -->
<div class="team-header">
    <div class="container">
        <h1 class="fw-bold display-5">Tim Kami</h1>
        <p class="lead opacity-75">Bertemu dengan para ahli di balik Arif Agro Farm</p>
    </div>
</div>

<!-- Menampilkan Gambar Manajemen -->
<div class="container pb-5">
    <div class="row g-4 justify-content-center">
        <?php if(!empty($teams)): ?>
            <?php foreach($teams as $t): ?>
            <div class="col-lg-3 col-md-6">
                <div class="team-card-modern h-100">
                    <div class="team-img-wrap">
                        <img src="/img/team/<?= $t['foto']; ?>" alt="<?= $t['nama']; ?>" 
                             onerror="this.src='https://source.unsplash.com/400x500/?business person'" loading="lazy">
                        
                        <div class="social-overlay">
                            <?php if(!empty($t['linkedin']) && $t['linkedin'] != '-'): ?>
                                <a href="<?= (strpos($t['linkedin'], 'http') !== false) ? $t['linkedin'] : 'https://' . $t['linkedin']; ?>" target="_blank" class="team-social-link" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <?php endif; ?>

                            <?php if(!empty($t['instagram']) && $t['instagram'] != '-'): ?>
                                <?php 
                                    $ig_clean = str_replace('@', '', $t['instagram']);
                                    $ig_link = (strpos($ig_clean, 'http') !== false) ? $ig_clean : 'https://instagram.com/' . $ig_clean;
                                ?>
                                <a href="<?= $ig_link; ?>" target="_blank" class="team-social-link" title="Instagram"><i class="bi bi-instagram"></i></a>
                            <?php endif; ?>

                            <?php if(!empty($t['email']) && $t['email'] != '-'): ?>
                                <a href="mailto:<?= $t['email']; ?>" class="team-social-link" title="Email"><i class="bi bi-envelope-fill"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5 class="fw-bold mb-1 text-dark"><?= $t['nama']; ?></h5>
                        <p class="text-success small fw-bold text-uppercase mb-0"><?= $t['jabatan']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center text-muted">Data tim tidak ditemukan.</div>
        <?php endif; ?>
    </div>
    
    <div class="text-center mt-5">
        <a href="/tentang-kami" class="btn btn-outline-success rounded-pill px-4">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Tentang Kami
        </a>
    </div>
</div>

<!-- Footer -->
<?= $this->endSection(); ?>