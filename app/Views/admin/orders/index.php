<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Daftar Pesanan Masuk</h3>
    <span class="badge bg-success"><?= count($orders); ?> Total Pesanan</span>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
    <tr>
        <th class="ps-4">ID</th>
        <th>Pemesan</th>
        <th>Produk</th>
        <th>Qty</th>
        <th>No. HP</th>
        <th>Status</th>
        <th class="text-end pe-4">Aksi</th>
        <th>Waktu Pesan</th> 
    </tr>
</thead>
<tbody>
    <?php foreach($orders as $o): ?>
    <tr>
        <td class="ps-4">#<?= $o['id']; ?></td>
        <td>
            <div class="fw-bold"><?= $o['nama_pemesan']; ?></div>
            <small class="text-muted"><?= $o['alamat']; ?></small>
        </td>
        <td><?= $o['nama_produk']; ?></td>
        <td><?= $o['jumlah']; ?></td>
        <td><?= $o['no_hp']; ?></td>
        <td>
            <?php 
                $status = strtolower($o['status']);
                $badgeClass = 'bg-secondary';
                if ($status == 'pending') $badgeClass = 'bg-warning text-dark';
                elseif ($status == 'proses' || $status == 'diproses') $badgeClass = 'bg-primary';
                elseif ($status == 'selesai') $badgeClass = 'bg-success';
                elseif ($status == 'batal') $badgeClass = 'bg-danger';
            ?>
            <span class="badge <?= $badgeClass; ?>"><?= ucfirst($o['status']); ?></span>
        </td>
        <td class="text-end pe-4">
            <div class="d-flex justify-content-end gap-2">
                <a href="/admin/orders/detail/<?= $o['id']; ?>" class="btn btn-sm btn-light border shadow-sm">
                    <i class="bi bi-eye"></i> Detail
                </a>
                <a href="/admin/orders/delete/<?= $o['id']; ?>" class="btn btn-sm btn-outline-danger shadow-sm btn-hapus">
                    <i class="bi bi-trash"></i> Hapus
                </a>
            </div>
        </td>
        <td>
            <div class="small fw-bold"><?= date('d/m/Y', strtotime($o['created_at'])); ?></div>
            <div class="text-muted small" style="font-size: 0.75rem;">
                <i class="bi bi-clock me-1"></i><?= date('H:i', strtotime($o['created_at'])); ?> WIB
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>
</div>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // 1. Untuk Munculkan Notifikasi Berhasil
    <?php if(session()->getFlashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('success'); ?>',
            showConfirmButton: false,
            timer: 2000,
            customClass: {
                popup: 'rounded-4'
            }
        });
    <?php endif; ?>

    // 2. Untuk Konfirmasi Hapus
    document.querySelectorAll('.btn-hapus').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data pesanan ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6e7881',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-4',
                    confirmButton: 'rounded-pill px-4',
                    cancelButton: 'rounded-pill px-4'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });
</script>

<!-- Footer -->
<?= $this->endSection(); ?>