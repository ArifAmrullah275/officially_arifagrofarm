<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- CSS -->
<style>
    /* Styling Khusus Tema Hijau */
    .hover-shadow:hover { box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
    .hover-scale:hover { transform: translateY(-2px); transition: 0.2s; }
    .transition-all { transition: all 0.3s ease; }
    
    /* Navigasi Tab Hijau */
    .nav-tabs .nav-link { color: #6c757d; border: none; border-bottom: 3px solid transparent; transition: 0.3s; }
    .nav-tabs .nav-link:hover { color: #198754; background-color: rgba(25, 135, 84, 0.05); }
    .nav-tabs .nav-link.active { color: #198754; border-bottom: 3px solid #198754; background: none; }
    
    /* Form Focus */
    .form-control:focus { box-shadow: none; border: 1px solid #198754; background-color: #fff; }
</style>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola Halaman <span class="text-success">Layanan</span></h3>
        <p class="text-muted mb-0">Atur statistik ringkas dan daftar kartu layanan.</p>
    </div>
    <a href="/layanan" class="btn btn-outline-success rounded-pill px-4" target="_blank">
        <i class="bi bi-eye me-2"></i> Preview Website
    </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div id="flash-error" data-message="<?= session()->getFlashdata('error'); ?>"></div>
<?php endif; ?>

<div class="card card-custom bg-white border-0 shadow-sm rounded-4 p-3">
    <div class="card-header bg-white border-bottom-0 pb-0">
        <ul class="nav nav-tabs card-header-tabs" id="serviceTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active fw-bold px-4 py-3" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button" onclick="setLastTab('stats')">
                    <i class="bi bi-bar-chart-steps me-2"></i> Statistik Ringkas
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link fw-bold px-4 py-3" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" onclick="setLastTab('list')">
                    <i class="bi bi-grid-fill me-2"></i> Daftar Layanan
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body pt-4">
        <div class="tab-content">
            
            <div class="tab-pane fade show active" id="stats" role="tabpanel">
                <form action="/admin/services/updateStats" method="post">
                    <div class="row g-3">
                        <?php for($i=1; $i<=4; $i++): ?>
                        <div class="col-md-3">
                            <div class="p-3 border border-success border-opacity-25 rounded bg-white h-100 position-relative hover-shadow transition-all">
                                <span class="badge bg-success position-absolute top-0 end-0 m-2 rounded-pill"><?= $i ?></span>
                                <h6 class="fw-bold text-success mb-3">Data Statistik</h6>
                                <div class="mb-2">
                                    <label class="small text-muted fw-bold">Nilai (Angka)</label>
                                    <input type="text" name="stat<?= $i; ?>_value" class="form-control fw-bold fs-5 text-dark border-0 bg-light shadow-none" value="<?= $stats['stat'.$i.'_value'] ?? '0'; ?>" placeholder="100+">
                                </div>
                                <div>
                                    <label class="small text-muted fw-bold">Label Keterangan</label>
                                    <input type="text" name="stat<?= $i; ?>_label" class="form-control border-0 bg-light shadow-none" value="<?= $stats['stat'.$i.'_label'] ?? 'Data'; ?>" placeholder="Pelanggan">
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                    <button type="submit" class="btn btn-success mt-4 px-5 fw-bold shadow-sm rounded-pill">
                        <i class="bi bi-save me-2"></i> Simpan Statistik
                    </button>
                </form>
            </div>

            <div class="tab-pane fade" id="list" role="tabpanel">
                
                <button class="btn btn-success mb-4 shadow-sm rounded-pill px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="bi bi-plus-lg me-2"></i> Tambah Layanan Baru
                </button>

                <div class="table-responsive border border-light rounded-4 shadow-sm">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                            <tr>
                                <th class="ps-4 py-3 border-0">Ikon</th>
                                <th class="border-0">Judul Layanan</th>
                                <th class="border-0">Deskripsi Singkat</th>
                                <th class="text-end pe-4 border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($services)): ?>
                                <?php foreach($services as $s): ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="bg-white border border-success border-opacity-25 rounded p-2 d-inline-block text-success fs-4 text-center shadow-sm" style="width: 50px; height: 50px;">
                                            <i class="bi <?= $s['ikon']; ?>"></i>
                                        </div>
                                        <div class="small text-muted mt-1 font-monospace" style="font-size: 0.7rem;"><?= $s['ikon']; ?></div>
                                    </td>
                                    <td class="fw-bold text-dark"><?= $s['judul']; ?></td>
                                    <td class="text-muted small" style="max-width: 300px;"><?= $s['deskripsi']; ?></td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-light border text-warning me-1 shadow-sm hover-scale" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editModal<?= $s['id']; ?>"
                                                title="Edit Layanan">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button onclick="confirmDelete('/admin/services/deleteService/<?= $s['id']; ?>')" 
                                                class="btn btn-sm btn-light border text-danger shadow-sm hover-scale"
                                                title="Hapus Layanan">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal<?= $s['id']; ?>" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow rounded-4">
                                            <form action="/admin/services/updateService" method="post">
                                                <div class="modal-header bg-white border-bottom-0">
                                                    <h5 class="modal-title fw-bold text-success"><i class="bi bi-pencil-square me-2"></i>Edit Layanan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body p-4 pt-0">
                                                    <input type="hidden" name="id" value="<?= $s['id']; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold text-muted">Judul</label>
                                                        <input type="text" name="judul" class="form-control bg-light border-0" value="<?= $s['judul']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold text-muted">Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control bg-light border-0" rows="3" required><?= $s['deskripsi']; ?></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label small fw-bold text-muted">Kode Ikon</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-light border-0 text-success"><i class="bi <?= $s['ikon']; ?>"></i></span>
                                                                <input type="text" name="ikon" class="form-control bg-light border-0" value="<?= $s['ikon']; ?>" required>
                                                            </div>
                                                            <div class="form-text mt-1">
                                                                <a href="https://icons.getbootstrap.com/" target="_blank" class="text-decoration-none small fw-bold text-success">
                                                                    <i class="bi bi-box-arrow-up-right me-1"></i> Cari Ikon Disini
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label small fw-bold text-muted">Link Tombol</label>
                                                            <input type="text" name="link_aksi" class="form-control bg-light border-0" value="<?= $s['link_aksi']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm fw-bold">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">Belum ada data layanan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <form action="/admin/services/storeService" method="post">
                <div class="modal-header bg-success text-white border-0 rounded-top-4">
                    <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle me-2"></i>Tambah Layanan Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Judul Layanan</label>
                        <input type="text" name="judul" class="form-control bg-light border-0" placeholder="Contoh: Suplai Sayur" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="deskripsi" class="form-control bg-light border-0" rows="3" placeholder="Jelaskan layanan secara singkat..." required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Kode Ikon</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-star"></i></span>
                                <input type="text" name="ikon" class="form-control bg-light border-0" placeholder="bi-cart-fill" required>
                            </div>
                            <div class="form-text mt-2 p-2 bg-light rounded border border-light">
                                <small class="d-block text-muted mb-1">Referensi Ikon:</small>
                                <a href="https://icons.getbootstrap.com/" target="_blank" class="btn btn-outline-success btn-sm w-100 d-flex align-items-center justify-content-center" style="font-size: 0.75rem;">
                                    <i class="bi bi-box-arrow-up-right me-2"></i> Buka Galeri Ikon
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Link Tombol</label>
                            <input type="text" name="link_aksi" class="form-control bg-light border-0" value="/kontak">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm fw-bold">Simpan Layanan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    // 1. LOGIC TAB PERSISTENCE
    function setLastTab(tabName) {
        localStorage.setItem('lastActiveTab', tabName);
    }

    document.addEventListener("DOMContentLoaded", function() {
        let lastTab = localStorage.getItem('lastActiveTab');
        if (!lastTab) lastTab = 'stats';

        // Aktifkan Tab
        const triggerEl = document.querySelector(`#${lastTab}-tab`);
        if (triggerEl) {
            const tab = new bootstrap.Tab(triggerEl);
            tab.show();
        }

        // 2. SWEETALERT
        const flashSuccess = document.getElementById('flash-success');
        const flashError = document.getElementById('flash-error');

        if (flashSuccess) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: flashSuccess.getAttribute('data-message'),
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true,
                confirmButtonColor: '#198754'
            });
        }

        if (flashError) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: flashError.getAttribute('data-message'),
                confirmButtonColor: '#d33',
            });
        }
    });

    // 3. CONFIRM DELETE SWEETALERT
    function confirmDelete(url) {
        Swal.fire({
            title: 'Hapus Layanan?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d', 
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                setLastTab('list'); 
                window.location.href = url;
            }
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>