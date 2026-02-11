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

    .section-label {
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: var(--primary-green);
        text-transform: uppercase;
        margin-bottom: 10px;
        display: block;
    }

    .custom-shape-divider-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .custom-shape-divider-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 60px;
    }

    .shape-fill-white { fill: var(--bg-off-white); }
    .shape-fill-green { fill: var(--soft-green); }
    .shape-fill-dark { fill: var(--dark-green); }

    /* === HERO HEADER === */
    .about-hero {
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.7), rgba(16, 185, 129, 0.7)), url('/img/Tentang_Kami.jpeg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: -80px;
        padding-top: 80px;
        position: relative;
        padding-bottom: 100px; 
    }

    .page-title {
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 1rem;
        font-size: 3.5rem;
        color: white;
        text-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    /* === STATS SECTION === */
    .stats-container {
        margin-top: -80px;
        position: relative;
        z-index: 10;
        padding: 0 20px;
        margin-bottom: 80px;
    }

    .stats-box {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 40px -10px rgba(6, 78, 59, 0.1);
        border: 1px solid rgba(255,255,255,0.8);
    }

    .stat-item h3 { 
        font-size: 2.8rem; 
        font-weight: 800; 
        color: var(--primary-green); 
        margin-bottom: 0px; 
    }

    .stat-item p { 
        font-size: 0.85rem; 
        color: var(--text-muted); 
        font-weight: 600; 
        text-transform: uppercase; 
        letter-spacing: 1px; 
        margin-top: 5px;
    }

    .border-end-custom { border-right: 1px solid #e2e8f0; }

    /* === PROFIL SECTION === */
    .section-profile {
        background-color: var(--bg-off-white);
        position: relative;
    }

    .read-more-content { display: none; }

    .read-more-btn { 
        color: var(--primary-green); 
        font-weight: 700; 
        text-decoration: none; 
        border-bottom: 2px solid var(--soft-green);
        cursor: pointer;
        transition: 0.3s;
    }
    .read-more-btn:hover { color: var(--dark-green); border-color: var(--primary-green); }

    /* === VISI MISI === */
    .section-visimisi {
        background-color: var(--soft-green);
        position: relative;
        overflow: hidden;
    }

    .section-visimisi::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 100%; height: 100%;
        background-image: radial-gradient(#10b981 1px, transparent 1px);
        background-size: 40px 40px;
        opacity: 0.1;
        z-index: 1;
    }

    .vm-card {
        background: white;
        border-radius: 20px;
        padding: 50px 40px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: none;
        transition: all 0.4s ease;
        position: relative;
        z-index: 2;
    }

    .vm-card:hover { transform: translateY(-10px); }
    
    .vm-icon {
        font-size: 2rem;
        color: white;
        background: var(--primary-green);
        width: 60px; height: 60px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    /* List Visi Misi */
    .mission-list { list-style: none; padding: 0; }
    .mission-item {
        margin-bottom: 15px;
        display: flex;
        align-items: start;
        padding: 15px;
        background: var(--bg-off-white);
        border-radius: 10px;
        transition: 0.3s;
    }

    .mission-item:hover { background: #f0fdf4; transform: translateX(5px); }
    .mission-number {
        font-weight: 800;
        color: var(--primary-green);
        margin-right: 15px;
        font-size: 1.2rem;
        line-height: 1;
    }

    /* === Team Manajemen === */
    .section-team {
        background-color: var(--dark-green); 
        color: white;
        position: relative;
        padding-bottom: 100px;
    }

    .team-card-modern {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        position: relative;
    }

    .team-card-modern:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 30px 60px rgba(0,0,0,0.4);
    }

    .team-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 125%;
        overflow: hidden;
        background: #f8fafc;
    }

    .team-img-wrap img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.6s ease;
    }

    .team-card-modern:hover .team-img-wrap img {
        transform: scale(1.1);
    }


    .team-img-wrap::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40%;
        background: linear-gradient(to top, rgba(0,0,0,0.4), transparent);
        opacity: 0;
        transition: 0.4s;
    }

    .team-card-modern:hover .team-img-wrap::after {
        opacity: 1;
    }

    .team-info { 
        padding: 25px 20px; 
        background: white; 
        text-align: center;
        position: relative;
        z-index: 6; 
    }

    .team-info h5 {
        font-size: 1.15rem;
        letter-spacing: -0.5px;
    }

    .social-overlay {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%) translateY(20px);
        background: rgba(255, 255, 255, 0.15); 
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 10px 18px;
        border-radius: 30px;
        display: flex; 
        gap: 12px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 5;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        opacity: 0;
        visibility: hidden;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .team-card-modern:hover .social-overlay { 
        transform: translateX(-50%) translateY(0); 
        opacity: 1;
        visibility: visible;
    }

    .social-overlay .social-link { 
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2); 
        color: #ffffff !important; 
        border-radius: 10px; 
        font-size: 1.1rem; 
        transition: all 0.3s ease; 
        text-decoration: none;
        border: none;
    }

    .social-overlay .social-link:hover { 
        background: var(--primary-green) !important; 
        color: #ffffff !important;
        transform: translateY(-5px); 
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
    }

    /* === Mitra Strategis Section === */
    .section-mitra {
        background-color: var(--soft-green);
        position: relative;
    }
    
    .mitra-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }

    .mitra-card {
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 15px;
        padding: 25px;
        width: 250px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .mitra-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(16, 185, 129, 0.1);
        border-color: green;
    }

    .mitra-card img {
        max-width: 100%;
        max-height: 100%;
        filter: grayscale(100%);
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .mitra-card:hover img {
        filter: grayscale(0%);
        opacity: 1;
    }

    @media (max-width: 768px) {
        .social-overlay {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
            background: rgba(255, 255, 255, 0.9); 
            bottom: 10px;
            padding: 5px 12px;
        }
        .social-overlay .social-link {
            color: var(--dark-green) !important; 
            background: rgba(0, 0, 0, 0.05);
        }
        .mitra-card {
            width: 140px;
            padding: 15px;
        }
    }
</style>

<!-- Tentang Kami Hero Section -->
<div class="about-hero">
    <div class="container" data-aos="zoom-in">
        <h1 class="display-3 page-title">Tentang Kami</h1>
        <p class="lead fs-5 mb-4 fw-light text-white opacity-90" style="max-width: 750px; margin: 0 auto;">
            <?= $profile['slogan'] ?? 'Membangun Ekosistem Pertanian Berkelanjutan'; ?>
        </p>
    </div>
</div>

<!-- Statistik Perusahaan -->
<div class="container stats-container">
    <div class="stats-box" data-aos="fade-up">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-md-0 stat-item border-end-custom">
                <h3 data-aos="count-up"><?= $profile['tahun_berdiri'] ?? '2021'; ?></h3>
                <p>Tahun Berdiri</p>
            </div>
            <div class="col-md-3 col-6 mb-md-0 stat-item border-end-custom">
                <h3><?= $profile['jumlah_mitra'] ?? '50+'; ?></h3>
                <p>Mitra Petani</p>
            </div>
            <div class="col-md-3 col-6 stat-item border-end-custom">
                <h3><?= $profile['luas_lahan'] ?? '10Ha'; ?></h3>
                <p>Lahan Kelola</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h3><?= $profile['persen_organik'] ?? '100%'; ?></h3>
                <p>Organik</p>
            </div>
        </div>
    </div>
</div>

<!-- Section Profil Perusahaan -->
<div class="section-profile py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            
            <div class="col-lg-5 mb-5 mb-lg-0 text-center position-relative" data-aos="fade-right">
                <style>
                    .logo-showcase {
                        position: relative;
                        display: inline-block;
                        padding: 30px;
                        z-index: 2;
                    }
                    /* Blob Animasi Belakang */
                    .logo-blob {
                        position: absolute;
                        top: 50%; left: 50%;
                        transform: translate(-50%, -50%);
                        width: 110%;
                        height: 110%;
                        background: radial-gradient(circle, var(--soft-green) 0%, rgba(255,255,255,0) 70%);
                        border-radius: 50%;
                        z-index: 1;
                        animation: pulse-green 3s infinite ease-in-out;
                    }
                    /* Container Glass Logo */
                    .logo-card-wrapper {
                        background: rgba(255, 255, 255, 0.7);
                        backdrop-filter: blur(15px);
                        -webkit-backdrop-filter: blur(15px);
                        border: 1px solid rgba(255, 255, 255, 0.9);
                        border-radius: 40px;
                        padding: 40px;
                        box-shadow: 0 20px 60px rgba(16, 185, 129, 0.15);
                        position: relative;
                        z-index: 2;
                        transition: transform 0.4s ease;
                    }
                    .logo-card-wrapper:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 30px 70px rgba(16, 185, 129, 0.2);
                    }
                    .logo-img-main {
                        width: 100%;
                        max-width: 300px;
                        height: auto;
                        filter: drop-shadow(0 10px 15px rgba(0,0,0,0.05));
                    }
                    @keyframes pulse-green {
                        0% { transform: translate(-50%, -50%) scale(0.9); opacity: 0.5; }
                        50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.8; }
                        100% { transform: translate(-50%, -50%) scale(0.9); opacity: 0.5; }
                    }
                    /* Floating Badge Experience */
                    .exp-badge {
                        position: absolute;
                        bottom: -15px;
                        right: 10px;
                        background: var(--dark-green);
                        color: white;
                        padding: 15px 25px;
                        border-radius: 20px;
                        box-shadow: 0 10px 25px rgba(6, 78, 59, 0.25);
                        z-index: 3;
                        border: 4px solid var(--bg-off-white);
                        text-align: left;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    }
                </style>

                <!-- Logo Perusahaan -->
                <div class="logo-showcase">
                    <div class="logo-blob"></div>
                    <div class="logo-card-wrapper">
                        <img src="/img/logo_AAF.png" 
                             alt="Logo Arif Agro Farm" 
                             class="logo-img-main"
                             onerror="this.src='https://placehold.co/400x400/png?text=Logo+AAF'">
                    </div>
                    <div class="exp-badge">
                        <div class="display-6 fw-bold mb-0 lh-1 text-white">
                            <?php 
                                $thn_berdiri = $profile['tahun_berdiri'] ?? 2021;
                                $lama_berdiri = date('Y') - intval($thn_berdiri);
                                echo ($lama_berdiri < 1) ? '1' : $lama_berdiri; 
                            ?>+
                        </div>
                        <div class="lh-1">
                            <span class="d-block text-white-50 text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 1px;">Tahun</span>
                            <span class="fw-bold fs-6">Pengalaman</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profil Perusahaan -->
            <div class="col-lg-7 ps-lg-5" data-aos="fade-left">
                <span class="section-label">Profil Perusahaan</span>
                <h2 class="fw-bold mb-4 text-dark display-6">PT. Arif Agro Farm</h2>
                
                <div class="text-muted text-justify lead fs-6 mb-4" id="desc-container">
                    <?php 
                        $deskripsi = $profile['deskripsi'] ?? 'PT. Arif Agro Farm adalah...'; 
                        $limit = 300;
                        if (strlen($deskripsi) > $limit) {
                            $awal = substr($deskripsi, 0, $limit);
                            $sisanya = substr($deskripsi, $limit);
                        } else {
                            $awal = $deskripsi;
                            $sisanya = '';
                        }
                    ?>
                    <p>
                        <?= nl2br($awal); ?>
                        <span id="dots" style="<?= empty($sisanya) ? 'display:none;' : '' ?>">...</span>
                        <span class="read-more-content" id="more"><?= nl2br($sisanya); ?></span>
                    </p>
                    <?php if(!empty($sisanya)): ?>
                        <a href="javascript:void(0);" onclick="toggleReadMore()" id="readMoreBtn" class="read-more-btn mt-2 d-inline-block">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    <?php endif; ?>
                </div>

                <div class="row mt-4 g-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center bg-white p-3 rounded-4 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="text-success me-3" fill="currentColor">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z" opacity="0.3"/>
                                <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,21.74C8.72,15.5 10.93,12 17,10V8Z"/> 
                                <path d="M16,13L13,16H15V18H17V16H19L16,13Z" />
                            </svg>
                            <span class="fw-bold text-dark small">Pertanian Berkelanjutan</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center bg-white p-3 rounded-4 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" class="text-success me-3" fill="currentColor">
                                <path d="M12,2C9,2 7,3.5 7,5.5C7,6.5 7.5,7.5 8.5,8.5L9,9L8.5,14C8.5,15.5 9.5,17 11,17H13C14.5,17 15.5,15.5 15.5,14L15,9L15.5,8.5C16.5,7.5 17,6.5 17,5.5C17,3.5 15,2 12,2M12,4C13,4 14,4.5 14,5.5C14,6 13.5,6.5 13,6.5C12.5,6.5 12,6 12,5.5C12,5 12.5,4.5 13,4.5H11C11.5,4.5 12,5 12,5.5C12,6 11.5,6.5 11,6.5C10.5,6.5 10,6 10,5.5C10,4.5 11,4 12,4M5,8L7,10V14L5,17L3,14V10L5,8M19,8L21,10V14L19,17L17,14V10L19,8Z"/>
                            </svg>
                            <span class="fw-bold text-dark small">Peternakan Modern</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Visi Misi -->
<div class="section-visimisi py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Roadmap Masa Depan</span>
            <h2 class="fw-bold text-dark">Visi & Misi Perusahaan</h2>
            <div style="width: 60px; height: 4px; background: var(--primary-green); margin: 10px auto; border-radius: 2px;"></div>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                <div class="vm-card d-flex flex-column justify-content-center text-center">
                    <div class="vm-icon mx-auto"><i class="bi bi-lightbulb-fill"></i></div>
                    <h3 class="fw-bold text-dark mb-3">Visi Kami</h3>
                    <p class="lead text-muted fst-italic mb-0">
                        "<?= nl2br($profile['visi'] ?? 'Menjadi pemimpin dalam inovasi pertanian...'); ?>"
                    </p>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                <div class="vm-card">
                    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                        <div class="vm-icon mb-0 me-3" style="width: 50px; height: 50px; font-size: 1.5rem; border-radius: 10px;"><i class="bi bi-bullseye"></i></div>
                        <h3 class="fw-bold text-dark mb-0">Misi Kami</h3>
                    </div>
                    
                    <ul class="mission-list">
                        <?php 
                        $misiRaw = $profile['misi'] ?? '';
                        $misiList = [];

                        if(is_array($misiRaw)) {
                            $misiList = $misiRaw;
                        } else {
                            $lines = explode(PHP_EOL, $misiRaw);
                            foreach($lines as $line) {
                                if(trim($line) != '') {
                                    $cleanLine = preg_replace('/^\d+\.\s*/', '', trim($line));
                                    $misiList[] = $cleanLine;
                                }
                            }
                        }
                        ?>

                        <?php if(!empty($misiList)): ?>
                            <?php $no = 1; foreach($misiList as $m): ?>
                            <li class="mission-item">
                                <span class="mission-number"><?= str_pad($no++, 2, '0', STR_PAD_LEFT); ?>.</span>
                                <span class="text-dark opacity-80 fw-medium"><?= $m; ?></span>
                            </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted">Data misi belum tersedia.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Tim Manajemen -->
<div class="section-team">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 flex-wrap" data-aos="fade-up">
            <div class="col-lg-8">
                <span class="section-label">Leadership Team</span>
                <h2 class="fw-bold display-6">Profesional di Balik Layar</h2>
                <p class="text-white mb-0">Orang-orang berdedikasi yang siap memajukan sektor pertanian.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="/tim" class="btn btn-outline-light rounded-pill px-4">Lihat Semua Tim <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>

        <div class="row g-4 justify-content-center pb-5">
            <?php if(!empty($teams)): ?>
                <?php foreach($teams as $t): ?>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="team-card-modern h-100">
                        <div class="team-img-wrap">
                            <img src="/img/team/<?= $t['foto']; ?>" alt="<?= $t['nama']; ?>" 
                                 onerror="this.src='https://source.unsplash.com/400x500/?business person'"
                                 loading="lazy">
                            
                            <div class="social-overlay">
                                <?php if(!empty($t['linkedin']) && $t['linkedin'] != '-'): ?>
                                    <?php 
                                        $li_input = $t['linkedin'];
                                        if (strpos($li_input, 'http') !== false) {
                                            $li_link = $li_input;
                                        } else {
                                            $li_link = 'https://' . $li_input;
                                        }
                                    ?>
                                    <a href="<?= $li_link; ?>" target="_blank" class="social-link" title="LinkedIn">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($t['email']) && $t['email'] != '-'): ?>
                                    <a href="mailto:<?= $t['email']; ?>" class="social-link" title="Kirim Email">
                                        <i class="bi bi-envelope-fill"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if(!empty($t['instagram']) && $t['instagram'] != '-'): ?>
                                    <?php 
                                        $ig_input = $t['instagram'];
                                        // Hapus karakter '@' jika admin tidak sengaja memasukkannya
                                        $ig_clean = str_replace('@', '', $ig_input);
                                        
                                        // Cek apakah input berupa link lengkap (http) atau hanya username
                                        if (strpos($ig_clean, 'http') !== false) {
                                            $ig_link = $ig_clean; // Sudah berupa link
                                        } else {
                                            $ig_link = 'https://instagram.com/' . $ig_clean; // Tambahkan prefix url
                                        }
                                    ?>
                                    <a href="<?= $ig_link; ?>" target="_blank" class="social-link" title="Instagram">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="team-info">
                            <h5 class="fw-bold mb-1 text-dark"><?= $t['nama']; ?></h5>
                            <p class="text-success small fw-bold text-uppercase mb-0 letter-spacing-1" style="font-size: 0.75rem;"><?= $t['jabatan']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5 text-muted">Belum ada data tim yang ditampilkan.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Section Mitra Perusahaan -->
<div class="section-mitra py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Networking</span>
            <h2 class="fw-bold text-dark">Mitra Strategis Kami</h2>
            <p class="text-muted">Berkolaborasi dengan institusi terpercaya untuk hasil terbaik.</p>
            <div style="width: 60px; height: 4px; background: var(--primary-green); margin: 10px auto; border-radius: 2px;"></div>
        </div>

        <div class="mitra-wrapper" data-aos="fade-up" data-aos-delay="200">
            <?php if(!empty($mitra)): ?>
                <?php foreach($mitra as $m): ?>
                <div class="mitra-card">
                    <img src="/img/mitra/<?= $m['logo']; ?>" alt="<?= $m['nama']; ?>" title="<?= $m['nama']; ?>"
                         onerror="this.src='https://placehold.co/150x80/png?text=Logo+Mitra'">
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="mitra-card"><img src="https://placehold.co/150x80/png?text=Mitra+1" alt="Mitra"></div>
                <div class="mitra-card"><img src="https://placehold.co/150x80/png?text=Mitra+2" alt="Mitra"></div>
                <div class="mitra-card"><img src="https://placehold.co/150x80/png?text=Mitra+3" alt="Mitra"></div>
                <div class="mitra-card"><img src="https://placehold.co/150x80/png?text=Mitra+4" alt="Mitra"></div>
                <div class="mitra-card"><img src="https://placehold.co/150x80/png?text=Mitra+5" alt="Mitra"></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, offset: 100, duration: 800, easing: 'ease-out-cubic' });

    function toggleReadMore() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("readMoreBtn");
        var container = document.getElementById("desc-container"); 

        if (dots.style.display !== "none") {
            // Expand (Buka)
            dots.style.display = "none";
            btnText.innerHTML = "Tutup <i class='bi bi-arrow-up'></i>";
            moreText.style.display = "inline";
        } else {
            // Collapse (Tutup)
            dots.style.display = "inline";
            btnText.innerHTML = "Baca Selengkapnya <i class='bi bi-arrow-right'></i>";
            moreText.style.display = "none";
            
            // FIX: Scroll kembali ke tengah container 
            container.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>