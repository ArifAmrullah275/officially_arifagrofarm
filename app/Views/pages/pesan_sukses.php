<!-- Header -->
<?= $this->extend('layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<?php
    // --- Pesan Whatsapp Otomatis ---
    
    // 1. Nomor WA
    $no_admin = '6283827914570'; 

    // 2. ID Pesanan
    $id_pesanan = '#AAF-' . str_pad($order['id'], 5, '0', STR_PAD_LEFT);

    // 3. Pesan WA
    $text  = "Halo Admin PT. Arif Agro Farm, 👋\n\n";
    $text .= "Saya ingin konfirmasi pesanan baru dengan detail berikut:\n";
    $text .= "----------------------------------\n";
    $text .= "*ID Pesanan* : " . $id_pesanan . "\n";
    $text .= "*Nama Pemesan* : " . $order['nama_pemesan'] . "\n";
    $text .= "*Produk* : " . $order['nama_produk'] . "\n";
    $text .= "*Jumlah* : " . $order['jumlah'] . " Unit\n";
    $text .= "*No. HP* : " . $order['no_hp'] . "\n";
    $text .= "----------------------------------\n\n";
    $text .= "Mohon diproses dan informasikan total harga serta nomor rekening pembayaran. Terima kasih! 🙏";

    // 4. Encode Pesan ke URL
    $pesan_final = urlencode($text);

    // 5. Link WA
    $link_wa = "https://wa.me/$no_admin?text=$pesan_final";
?>

<!-- CSS -->
<style>
    .success-wrapper {
        background: linear-gradient(135deg, rgba(15, 81, 50, 0.9), rgba(25, 135, 84, 0.8)), url('/img/Produk.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: -65px; 
        padding-top: 100px;
        position: relative;
    }

    .success-card-container {
        margin-top: 40px;
        position: relative;
        z-index: 10;
        padding-bottom: 80px;
    }

    .card-success {
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(3, 2, 2, 0.19);
    }
    
    .btn-wa {
        background-color: #25D366;
        color: white;
        border: none;
        transition: all 0.3s;
    }
    .btn-wa:hover {
        background-color: #128C7E;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
    }
</style>

<!-- Hero Section Pesanan Berhasil -->
<div class="success-wrapper text-white">
    <div class="container">
        <h1 class="fw-bold text-uppercase">Terima Kasih!</h1>
        <p class="lead opacity-90">Pesanan Anda telah kami terima dengan baik.</p>
    </div>
</div>

<!-- Card Konfirmasi Pesanan -->
<div class="container success-card-container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-success p-4 p-md-5 text-center">
                <div class="mb-4">
                    <i class="bi bi-check-circle-fill text-success display-1"></i>
                </div>
                <h3 class="fw-bold mt-2">Pesanan Berhasil Dibuat!</h3>
                <p class="text-muted">Halo <strong><?= $order['nama_pemesan']; ?></strong>, langkah terakhir adalah konfirmasi pesanan Anda ke Admin via WhatsApp.</p>
                
                <div class="bg-light p-3 rounded-4 mb-4 border">
                    <h4 class="fw-bold text-success mb-0"><?= $id_pesanan; ?></h4>
                </div>

                <div class="text-start p-3 rounded-3 bg-light bg-opacity-50 small mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Produk:</span>
                        <span class="fw-bold"><?= $order['nama_produk']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Jumlah:</span>
                        <span class="fw-bold"><?= $order['jumlah']; ?> Unit</span>
                    </div>
                    <hr class="my-2">
                    <p class="mb-0 text-center text-muted fst-italic">Klik tombol di bawah, dan pesan konfirmasi akan otomatis terketik di WhatsApp Anda.</p>
                </div>

                <div class="d-grid gap-2">
                    <a href="<?= $link_wa; ?>" target="_blank" class="btn btn-wa rounded-pill px-4 py-3 fw-bold fs-5 shadow-sm">
                        <i class="bi bi-whatsapp me-2"></i>Kirim Konfirmasi Sekarang
                    </a>
                    
                    <div class="d-flex gap-2 justify-content-center mt-3">
                        <a href="/produk" class="btn btn-outline-success rounded-pill px-4 py-2 fw-bold w-100">
                            <i class="bi bi-cart-plus me-2"></i>Belanja Lagi
                        </a>
                        <a href="/" class="btn btn-outline-secondary rounded-pill px-4 py-2 w-100">
                            <i class="bi bi-house-door me-2"></i>Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?= $this->endSection(); ?>