<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Daftar <span class="text-success">Pelamar Kerja</span></h3>
    <p class="text-muted small">Pantau dan kelola berkas pelamar yang masuk melalui website.</p>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                <tr>
                    <th class="ps-4 py-3 border-0">Pelamar</th>
                    <th class="border-0">Posisi Dilamar</th>
                    <th class="border-0">Kontak</th>
                    <th class="border-0 text-center">Status</th>
                    <th class="text-end pe-4 border-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($applications as $a): ?>
                <tr>
                    <td class="ps-4">
                        <div class="fw-bold text-dark"><?= $a['nama_pelamar']; ?></div>
                        <small class="text-muted">Masuk: <?= date('d/m/Y H:i', strtotime($a['created_at'])); ?></small>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border"><?= $a['posisi']; ?></span>
                    </td>
                    <td>
                        <div class="small mb-1">
                            <a href="mailto:<?= $a['email']; ?>?subject=Update Lamaran Kerja - <?= $a['posisi']; ?>&body=Halo <?= $a['nama_pelamar']; ?>, kami ingin menginformasikan terkait lamaran Anda..." class="text-decoration-none text-dark">
                                <i class="bi bi-envelope me-1 text-primary"></i> <?= $a['email']; ?>
                            </a>
                        </div>
                        
                        <div class="small">
                            <?php 
                                // Membersihkan nomor telepon dan konversi 0 ke 62
                                $phone = preg_replace('/[^0-9]/', '', $a['telepon']);
                                if (strpos($phone, '0') === 0) {
                                    $phone = '62' . substr($phone, 1);
                                }
                                $wa_text = "Halo " . $a['nama_pelamar'] . ", kami dari tim rekrutmen ingin mengonfirmasi lamaran Anda untuk posisi " . $a['posisi'] . ".";
                            ?>
                            <a href="https://wa.me/<?= $phone; ?>?text=<?= urlencode($wa_text); ?>" target="_blank" class="text-decoration-none text-dark">
                                <i class="bi bi-whatsapp me-1 text-success"></i> <?= $a['telepon']; ?>
                            </a>
                        </div>
                    </td>
                    <td class="text-center">
                        <?php 
                            $badgeClass = [
                                'pending' => 'bg-warning',
                                'review' => 'bg-info',
                                'interview' => 'bg-success',
                                'rejected' => 'bg-danger'
                            ];
                        ?>
                        <span class="badge <?= $badgeClass[$a['status']] ?? 'bg-secondary'; ?> rounded-pill px-3">
                            <?= strtoupper($a['status']); ?>
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="/uploads/cv/<?= $a['file_cv']; ?>" class="btn btn-sm btn-outline-primary rounded-circle" target="_blank" title="Lihat CV">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#modalStatus<?= $a['id']; ?>" title="Ubah Status">
                                <i class="bi bi-arrow-repeat"></i>
                            </button>
                            <button onclick="confirmDelete('/admin/application/delete/<?= $a['id']; ?>', '<?= $a['nama_pelamar']; ?>')" class="btn btn-sm btn-outline-danger rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="modalStatus<?= $a['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content border-0 shadow rounded-4">
                            <form action="/admin/application/updateStatus" method="post">
                                <input type="hidden" name="id" value="<?= $a['id']; ?>">
                                <div class="modal-header border-0 pt-4 px-4">
                                    <h6 class="fw-bold mb-0">Ubah Status Pelamar</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body px-4">
                                    <select name="status" class="form-select bg-light border-0">
                                        <option value="pending" <?= ($a['status']=='pending')?'selected':''; ?>>Pending</option>
                                        <option value="review" <?= ($a['status']=='review')?'selected':''; ?>>Review</option>
                                        <option value="interview" <?= ($a['status']=='interview')?'selected':''; ?>>Interview</option>
                                        <option value="rejected" <?= ($a['status']=='rejected')?'selected':''; ?>>Rejected</option>
                                    </select>
                                </div>
                                <div class="modal-footer border-0 pb-4 px-4">
                                    <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold">Update Status</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if(empty($applications)): ?>
            <div class="text-center py-5">
                <p class="text-muted">Belum ada pelamar yang masuk.</p>
            </div>
        <?php endif; ?>
    </div>
</div>


<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Notifikasi Sukses
    const flashMessage = document.getElementById('flash-success');
    if (flashMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flashMessage.getAttribute('data-message'),
            timer: 3000,
            showConfirmButton: false
        });
    }

    // Konfirmasi Hapus
    function confirmDelete(url, name) {
        Swal.fire({
            title: 'Hapus Data Pelamar?',
            text: `Data ${name} dan file CV-nya akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => { 
            if (result.isConfirmed) { 
                window.location.href = url; 
            } 
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>