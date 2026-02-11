<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- CSS -->
<style>
    .hover-scale { transition: transform 0.2s; }
    .hover-scale:hover { transform: scale(1.05); }
    .transition-all { transition: all 0.3s ease; }
    .table tbody tr:hover { background-color: rgba(25, 135, 84, 0.02); }
    
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        border-color: #198754 !important;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1);
    }
</style>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola <span class="text-success">Karir & Loker</span></h3>
        <p class="text-muted mb-0 small">Manajemen lowongan pekerjaan yang tersedia di perusahaan.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-success rounded-pill px-4 fw-bold shadow-sm hover-scale" data-bs-toggle="modal" data-bs-target="#addCareerModal">
            <i class="bi bi-plus-lg me-2"></i> Tambah Loker
        </button>
        <a href="/karir" class="btn btn-outline-success rounded-pill px-3 shadow-sm hover-scale" target="_blank" title="Preview Website">
            <i class="bi bi-box-arrow-up-right"></i>
        </a>
    </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                <tr>
                    <th class="ps-4 py-3 border-0">Posisi</th>
                    <th class="border-0">Tipe / Lokasi</th>
                    <th class="border-0">Batas Lamaran</th>
                    <th class="text-end pe-4 border-0">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php foreach($careers as $c): ?>
                <tr class="transition-all">
                    <td class="ps-4">
                        <div class="fw-bold text-dark fs-6"><?= $c['posisi']; ?></div>
                        <div class="small text-muted text-truncate" style="max-width: 300px;"><?= $c['deskripsi']; ?></div>
                    </td>
                    <td>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold mb-1" style="font-size: 0.7rem;">
                            <i class="bi bi-clock-history me-1"></i> <?= $c['tipe']; ?>
                        </span><br>
                        <small class="text-muted"><i class="bi bi-geo-alt-fill text-success me-1"></i> <?= $c['lokasi']; ?></small>
                    </td>
                    <td>
                        <?php 
                            $isExpired = strtotime($c['batas_lamaran']) < time();
                        ?>
                        <div class="fw-bold <?= $isExpired ? 'text-danger' : 'text-dark'; ?>">
                            <i class="bi bi-calendar-event me-1"></i> <?= date('d M Y', strtotime($c['batas_lamaran'])); ?>
                        </div>
                        <?php if($isExpired): ?>
                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill mt-1" style="font-size: 0.6rem;">EXPIRED</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-sm btn-light border text-warning rounded-circle shadow-sm hover-scale" 
                                    style="width: 35px; height: 35px;"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal<?= $c['id']; ?>" title="Edit Lowongan">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button onclick="confirmDelete('/admin/career/delete/<?= $c['id']; ?>', '<?= $c['posisi']; ?>')" 
                                    class="btn btn-sm btn-light border text-danger rounded-circle shadow-sm hover-scale"
                                    style="width: 35px; height: 35px;"
                                    title="Hapus Lowongan">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade animate__animated animate__fadeIn" id="editModal<?= $c['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border-0 shadow rounded-4">
                            <form action="/admin/career/update" method="post">
                                <div class="modal-header bg-white border-bottom-0 pt-4 px-4">
                                    <h5 class="modal-title fw-bold text-success"><i class="bi bi-pencil-square me-2"></i>Edit Lowongan Kerja</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body p-4 pt-0">
                                    <input type="hidden" name="id" value="<?= $c['id']; ?>">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-muted">Nama Posisi</label>
                                            <input type="text" name="posisi" class="form-control bg-light border-0" value="<?= $c['posisi']; ?>" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label small fw-bold text-muted">Tipe</label>
                                            <select name="tipe" class="form-select bg-light border-0">
                                                <option value="Full Time" <?= ($c['tipe']=='Full Time')?'selected':''; ?>>Full Time</option>
                                                <option value="Part Time" <?= ($c['tipe']=='Part Time')?'selected':''; ?>>Part Time</option>
                                                <option value="Hybrid" <?= ($c['tipe']=='Hybrid')?'selected':''; ?>>Hybrid</option>
                                                <option value="Internship" <?= ($c['tipe']=='Internship')?'selected':''; ?>>Internship</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label small fw-bold text-muted">Batas Lamaran</label>
                                            <input type="date" name="batas_lamaran" class="form-control bg-light border-0" value="<?= $c['batas_lamaran']; ?>" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small fw-bold text-muted">Lokasi</label>
                                            <input type="text" name="lokasi" class="form-control bg-light border-0" value="<?= $c['lokasi']; ?>" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small fw-bold text-muted">Deskripsi Pekerjaan</label>
                                            <textarea name="deskripsi" class="form-control bg-light border-0" rows="3" required><?= $c['deskripsi']; ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small fw-bold text-muted">Kualifikasi (Pisahkan dengan tanda | )</label>
                                            <textarea name="kualifikasi" class="form-control bg-light border-0" rows="4" required><?= $c['kualifikasi']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0 pb-4 px-4">
                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php if(empty($careers)): ?>
            <div class="text-center py-5">
                <i class="bi bi-briefcase text-muted opacity-25" style="font-size: 4rem;"></i>
                <p class="text-muted mt-2">Belum ada lowongan kerja yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade animate__animated animate__fadeIn" id="addCareerModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
            <form action="/admin/career/store" method="post">
                <div class="modal-header bg-success text-white border-bottom-0 py-3">
                    <h5 class="modal-title fw-bold"><i class="bi bi-briefcase-fill me-2"></i> Tambah Lowongan Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Nama Posisi</label>
                            <input type="text" name="posisi" class="form-control bg-light border-0" placeholder="Contoh: Staff Admin / Field Operator" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Tipe</label>
                            <select name="tipe" class="form-select bg-light border-0">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Batas Lamaran</label>
                            <input type="date" name="batas_lamaran" class="form-control bg-light border-0" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control bg-light border-0" placeholder="Contoh: Jakarta Pusat / Remote" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Deskripsi Pekerjaan</label>
                            <textarea name="deskripsi" class="form-control bg-light border-0" rows="3" placeholder="Jelaskan secara singkat tanggung jawab utama..." required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Kualifikasi (Pisahkan dengan tanda | )</label>
                            <textarea name="kualifikasi" class="form-control bg-light border-0" rows="4" placeholder="Contoh: Pendidikan Min. SMA | Pengalaman 1 Tahun | Domisili Sekitar" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pb-4 px-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm">Terbitkan Lowongan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. SweetAlert Sukses
        const flashSuccess = document.getElementById('flash-success');
        if (flashSuccess) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: flashSuccess.getAttribute('data-message'),
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true,
                confirmButtonColor: '#198754',
                customClass: {
                    popup: 'rounded-4'
                }
            });
        }
    });

    // 2. SweetAlert Konfirmasi Hapus
    function confirmDelete(url, title) {
        Swal.fire({
            title: 'Hapus Lowongan?',
            text: `Anda akan menghapus posisi "${title}". Data ini tidak bisa dikembalikan!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-4'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>