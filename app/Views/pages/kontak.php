<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- CSS -->
<style>
    :root {
        --primary-green: #198754;
        --secondary-green: #4caf50;
        --soft-green-bg: #f8fdf9;
        --text-dark: #2c3e50;
    }

    body { font-family: 'Poppins', sans-serif; color: var(--text-dark); }

    /* === HERO HEADER === */
    .contact-hero {
       background: linear-gradient(rgba(20, 94, 56, 0.85), rgba(20, 94, 56, 0.75)), url('<?= base_url('img/Kontak.jpg'); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 115vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: -90px;
        padding-top: 100px;
        padding-bottom: 40px;
    }

    .page-title {
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 1rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        font-size: 3.5rem;
    }

    /* === CONTACT INFO BOXS === */
    .info-card {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: 0.3s;
        height: 100%;
        border: 1px solid #f0f0f0;
        display: flex;
        align-items: flex-start;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(25, 135, 84, 0.1);
        border-color: var(--secondary-green);
    }

    .info-icon {
        width: 50px; height: 50px;
        background: var(--soft-green-bg);
        color: var(--primary-green);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .info-content h6 { font-weight: 700; margin-bottom: 5px; color: var(--text-dark); }
    .info-content p { margin-bottom: 0; font-size: 0.9rem; color: #666; }
    .info-content a { text-decoration: none; color: #666; transition: 0.2s; }
    .info-content a:hover { color: var(--primary-green); }

    /* === FORM STYLING === */
    .contact-form-card {
        background: white;
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .form-header {
        background: var(--primary-green);
        padding: 30px;
        color: white;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        font-size: 0.95rem;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.15);
    }

    .form-label { font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; }

    /* === MAPS SECTION === */
    .map-wrapper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: 400px;
        width: 100%;
        border: 5px solid white;
    }

    .bg-green-soft { background-color: var(--soft-green-bg); }

    @media (max-width: 768px) {
        .contact-hero { min-height: 60vh; }
        .page-title { font-size: 2.5rem; }
    }
</style>

<!-- Hero Header Kontak -->
<div class="contact-hero">
    <div class="container" data-aos="zoom-in" data-aos-duration="1000">
        <h1 class="display-3 page-title">Hubungi Kami</h1>
        <p class="lead fs-4 mb-4 fw-light text-white">Kami Siap Mendengar Kebutuhan Pertanian Anda</p>
    </div>
</div>


<div class="bg-green-soft py-5">
    <div class="container py-4">
        <div class="row g-5">
            
        <!-- Section Informasi & Kontak -->
            <div class="col-lg-5">
                <div class="mb-4" data-aos="fade-right">
                    <h3 class="fw-bold mb-3">Informasi Kontak</h3>
                    <p class="text-muted">Jangan ragu untuk menghubungi kami melalui saluran berikut atau kunjungi kantor kami langsung.</p>
                </div>

                <div class="row g-3">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="info-content">
                                <h6>Alamat Kantor</h6>
                                <p>Jl. Raya Kosar III, Kosar, Cipeundeuy, Subang, Jawa Barat 41272</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div class="info-content">
                                <h6>Telepon & WhatsApp</h6>
                                <p>
                                    <a href="https://wa.me/6283827914570?text=Halo%20Admin%20Arif%20Agro%20Farm%2C%20saya%20ingin%20bertanya%20mengenai%20layanan%20Anda." target="_blank">
                                        <i class="bi bi-whatsapp me-1"></i> +62 838-2791-4570
                                    </a>
                                </p>
                                <p>
                                    <a href="tel:+62260123456">
                                        <i class="bi bi-telephone me-1"></i> (0260) 123-456
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div class="info-content">
                                <h6>Email</h6>
                                <p><a href="mailto:sahabttanimuda27@gmail.com">sahabttanimuda27@gmail.com</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-clock-fill"></i></div>
                            <div class="info-content">
                                <h6>Jam Operasional</h6>
                                <p>Senin - Jumat: 08.00 - 17.00 WIB</p>
                                <p>Sabtu: 08.00 - 14.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kirim Pesan, Kritik, Saran -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-form-card">
                    <div class="form-header">
                        <h4 class="mb-0 fw-bold"><i class="bi bi-send-fill me-2"></i> Kirim Pesan</h4>
                        <p class="mb-0 opacity-75 small">Kami akan membalas pesan Anda sesegera mungkin.</p>
                    </div>
                    <div class="p-4 p-md-5">
                        <form action="<?= base_url('/kontak/kirim'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subjek" class="form-label">Subjek Pesan</label>
                                <select class="form-select" id="subjek" name="subjek" required>
                                    <option selected disabled value="">Pilih keperluan...</option>
                                    <option value="1">Pemesanan Produk</option>
                                    <option value="2">Konsultasi Smart Farming</option>
                                    <option value="3">Kerjasama Bisnis</option>
                                    <option value="4">Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="pesan" class="form-label">Isi Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tuliskan detail pertanyaan atau kebutuhan Anda di sini..." required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100 py-3 rounded-3 fw-bold shadow-sm">
                                <i class="bi bi-paperplane-fill me-2"></i> Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Informasi Lokasi dengan Maps -->
<div class="container py-5 mb-4">
    <div class="text-center mb-4" data-aos="fade-up">
        <h3 class="fw-bold">Lokasi Kami</h3>
        <p class="text-muted">Kunjungi kebun dan kantor kami di Subang.</p>
    </div>
    
    <div style="text-align: center;" class="map-wrapper" data-aos="zoom-in">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510.934017621305!2d107.62669621566678!3d-6.444477925198916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6915007c52aaff%3A0xb86cabf826b63d62!2sArif%20Agro%20Farm!5e1!3m2!1sid!2sid!4v1767741950795!5m2!1sid!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<!-- Java Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    AOS.init({
        once: true,
        offset: 50,
        duration: 800,
    });

    // SweetAlert 
    document.addEventListener("DOMContentLoaded", function() {
    <?php if (session()->getFlashdata('success')) : ?>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('success'); ?>',
            icon: 'success',
            confirmButtonColor: '#198754',
                confirmButtonText: 'Baik, Terima Kasih',
                backdrop: `
                    rgba(25, 135, 84, 0.1)
                `,
                customClass: {
                    popup: 'rounded-4 shadow-lg border-0',
                    confirmButton: 'px-4 py-2 rounded-3 fw-bold'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        <?php endif; ?>

        // Cek apakah ada flashdata 'error'
        <?php if (session()->getFlashdata('error')) : ?>
            Swal.fire({
                title: 'Gagal Mengirim',
                text: '<?= session()->getFlashdata('error'); ?>',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Coba Lagi',
                customClass: {
                    popup: 'rounded-4 shadow-lg border-0'
                }
            });
        <?php endif; ?>
    });
</script>

<!-- Footer -->
<?= $this->endSection(); ?>