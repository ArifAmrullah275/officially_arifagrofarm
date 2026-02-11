<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="/admin/orders" class="btn btn-outline-secondary btn-sm rounded-pill">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Pesanan
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <img src="/img/products/<?= $order['foto_produk']; ?>" class="card-img-top" style="height: 250px; object-fit: cover;" onerror="this.src='https://placehold.co/600x400?text=Produk'">
            <div class="card-body p-4 text-center">
                <span class="badge bg-success bg-opacity-10 text-success mb-2">Produk yang Dipesan</span>
                <h4 class="fw-bold text-dark mb-1"><?= $order['nama_produk']; ?></h4>
                <p class="text-muted mb-0"><?= $order['harga_label']; ?></p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Rincian Pengiriman</h5>
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Status: <?= ucfirst($order['status']); ?></span>
                </div>
            </div>
            <div class="card-body p-4 pt-0">
                <div class="row g-4 mt-1">
                    <div class="col-md-6">
                        <label class="small text-muted text-uppercase fw-bold">ID Pesanan</label>
                        <p class="fw-bold text-dark">#AAF-<?= str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted text-uppercase fw-bold">Tanggal & Waktu Pesan</label>
                        <p class="text-dark fw-medium">
                            <i class="bi bi-calendar3 me-2 text-success"></i>
                            <?= date('d F Y, H:i', strtotime($order['created_at'])); ?> WIB
                        </p>
                    </div>
                    <div class="col-12">
                        <label class="small text-muted text-uppercase fw-bold">Nama Pemesan</label>
                        <p class="text-dark fs-5 fw-medium"><?= $order['nama_pemesan']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted text-uppercase fw-bold">Nomor WhatsApp</label>
                        <p class="text-dark"><?= $order['no_hp']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted text-uppercase fw-bold">Jumlah Pesanan</label>
                        <p class="text-dark"><?= $order['jumlah']; ?> Unit / Item</p>
                    </div>
                    <div class="col-12">
                        <label class="small text-muted text-uppercase fw-bold">Alamat Lengkap</label>
                        <p class="text-dark bg-light p-3 rounded-3"><?= $order['alamat']; ?></p>
                    </div>
                    <div class="col-12">
                        <label class="small text-muted text-uppercase fw-bold">Catatan Tambahan</label>
                        <p class="text-dark italic"><?= !empty($order['catatan']) ? $order['catatan'] : '- Tidak ada catatan -'; ?></p>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex gap-2">
                    <?php 
                        // Link WA Otomatis untuk Admin menghubungi Pembeli
                        $wa_number = (substr($order['no_hp'], 0, 1) == '0') ? '62' . substr($order['no_hp'], 1) : $order['no_hp'];
                        $wa_link = "https://wa.me/{$wa_number}?text=Halo%20{$order['nama_pemesan']},%20kami%20dari%20Arif%20Agro%20Farm%20ingin%20mengonfirmasi%20pesanan%20Anda%20#AAF-{$order['id']}";
                    ?>
                    <a href="<?= $wa_link; ?>" target="_blank" class="btn btn-success rounded-pill px-4">
                        <i class="bi bi-whatsapp me-2"></i> Hubungi Pembeli
                    </a>
                    <button class="btn btn-primary rounded-pill px-4" onclick="window.print()">
                        <i class="bi bi-printer me-2"></i> Cetak Invoice
                    </button>
                </div>

                <div class="col-12 mt-3">
    <label class="small text-muted text-uppercase fw-bold">Update Status Pesanan</label>
    <form action="/admin/orders/update/<?= $order['id']; ?>" method="post" class="d-flex gap-2 mt-2">
        <?= csrf_field(); ?>
        <select name="status" class="form-select form-select-sm rounded-pill" style="width: 200px;">
            <option value="pending" <?= ($order['status'] == 'pending') ? 'selected' : ''; ?>>Pending (Menunggu)</option>
            <option value="proses" <?= ($order['status'] == 'proses') ? 'selected' : ''; ?>>Diproses</option>
            <option value="selesai" <?= ($order['status'] == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
            <option value="batal" <?= ($order['status'] == 'batal') ? 'selected' : ''; ?>>Dibatalkan</option>
        </select>
        <button type="submit" class="btn btn-dark btn-sm rounded-pill px-3">Update</button>
    </form>
</div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?= $this->endSection(); ?>