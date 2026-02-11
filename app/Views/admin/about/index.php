<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- CSS -->
<style>
    body { font-size: 0.9rem; }
    h3 { font-size: 1.5rem !important; }
    h5 { font-size: 1.1rem !important; }
    h6 { font-size: 0.95rem !important; }
    .nav-tabs .nav-link { color: #6c757d; transition: all 0.3s ease; font-size: 0.9rem; border: none; border-bottom: 3px solid transparent; background: transparent; }
    .nav-tabs .nav-link:hover { color: #198754; background-color: rgba(25, 135, 84, 0.05); }
    .nav-tabs .nav-link.active { color: #198754 !important; border-bottom: 3px solid #198754 !important; background: transparent !important; font-weight: bold; }
    .form-control { font-size: 0.85rem !important; }
    .hover-scale:hover { transform: translateY(-2px); transition: 0.2s; }
    .hover-danger:hover { background-color: #dc3545 !important; color: white !important; border-color: #dc3545 !important; }
</style>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola Halaman <span class="text-success" id="dynamic-title">Profil & Statistik</span></h3>
        <p class="text-muted mb-0 small">Atur profil perusahaan, visi misi, statistik, tim, dan mitra dengan mudah.</p>
    </div>
    <a href="/tentang-kami" class="btn btn-outline-success rounded-pill px-4 btn-sm fw-bold d-flex align-items-center shadow-sm" target="_blank">
        <i class="bi bi-box-arrow-up-right me-2"></i> Preview Website
    </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div id="flash-error" data-message="<?= session()->getFlashdata('error'); ?>"></div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-bottom p-0">
        <ul class="nav nav-tabs nav-justified border-0" id="aboutTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold py-3" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" onclick="setLastTab('profil')">
                    <i class="bi bi-building me-2"></i> Profil & Statistik
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3 text-secondary" id="tim-tab" data-bs-toggle="tab" data-bs-target="#tim" type="button" onclick="setLastTab('tim')">
                    <i class="bi bi-people me-2"></i> Tim Manajemen
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3 text-secondary" id="mitra-tab" data-bs-toggle="tab" data-bs-target="#mitra" type="button" onclick="setLastTab('mitra')">
                    <i class="bi bi-handshake me-2"></i> Mitra Strategis
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-4 bg-light bg-opacity-10">
        <div class="tab-content" id="aboutTabContent">
            
            <div class="tab-pane fade show active" id="profil" role="tabpanel">
                <form action="/admin/about/updateProfile" method="post">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="bg-white p-4 rounded-4 shadow-sm h-100 border border-light">
                                <h6 class="fw-bold text-success mb-4 border-bottom pb-2">Informasi Umum</h6>
                                
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Slogan Utama</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-megaphone"></i></span>
                                        <input type="text" name="slogan" class="form-control bg-light border-0" value="<?= $profile['slogan']; ?>" placeholder="Masukkan slogan perusahaan...">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Deskripsi Perusahaan</label>
                                    <textarea name="deskripsi" class="form-control bg-light border-0" rows="5" placeholder="Ceritakan tentang perusahaan Anda..."><?= $profile['deskripsi']; ?></textarea>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-success text-uppercase"><i class="bi bi-eye me-1"></i> Visi</label>
                                        <textarea name="visi" class="form-control bg-success bg-opacity-10 border-0 text-dark" rows="4" placeholder="Visi perusahaan..."><?= $profile['visi']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-success text-uppercase"><i class="bi bi-bullseye me-1"></i> Misi</label>
                                        <textarea name="misi" class="form-control bg-success bg-opacity-10 border-0 text-dark" rows="4" placeholder="Misi perusahaan..."><?= $profile['misi']; ?></textarea>
                                        <div class="form-text text-muted small fst-italic ms-1">*Pisahkan poin dengan tanda | (garis tegak)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="bg-white p-4 rounded-4 shadow-sm h-100 border border-success border-opacity-25">
                                <h6 class="fw-bold text-success mb-4 border-bottom pb-2"><i class="bi bi-graph-up-arrow me-2"></i>Statistik</h6>
                                
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Tahun Berdiri</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-calendar-check"></i></span>
                                        <input type="text" name="tahun_berdiri" class="form-control bg-light border-0 fw-bold" value="<?= $profile['tahun_berdiri']; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Jumlah Mitra</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-people-fill"></i></span>
                                        <input type="text" name="jumlah_mitra" class="form-control bg-light border-0 fw-bold" value="<?= $profile['jumlah_mitra']; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Luas Lahan</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-flower1"></i></span>
                                        <input type="text" name="luas_lahan" class="form-control bg-light border-0 fw-bold" value="<?= $profile['luas_lahan']; ?>">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted">Persen Organik</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-percent"></i></span>
                                        <input type="text" name="persen_organik" class="form-control bg-light border-0 fw-bold" value="<?= $profile['persen_organik']; ?>">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success w-100 py-2 rounded-pill fw-bold shadow hover-scale">
                                    <i class="bi bi-save2 me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="tim" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="bg-white p-4 rounded-4 shadow-sm border border-secondary border-opacity-10 h-100">
                            <h6 class="fw-bold mb-4 text-success border-bottom pb-2"><i class="bi bi-person-plus-fill me-2"></i>Tambah Anggota</h6>
                            
                            <form action="/admin/about/storeTeam" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control bg-light border-0" required placeholder="Contoh: Budi Santoso">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control bg-light border-0" required placeholder="Contoh: Manager Operasional">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Email (Opsional)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" class="form-control bg-light border-0" placeholder="nama@email.com">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Instagram (Opsional)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-instagram"></i></span>
                                        <input type="text" name="instagram" class="form-control bg-light border-0" placeholder="@username">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">LinkedIn (Opsional)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-success"><i class="bi bi-linkedin"></i></span>
                                        <input type="text" name="linkedin" class="form-control bg-light border-0" placeholder="https://linkedin.com/...">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted">Foto Profil</label>
                                    <input type="file" name="foto" class="form-control bg-light border-0" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2 rounded-pill fw-bold shadow-sm hover-scale">
                                    <i class="bi bi-plus-lg me-1"></i> Tambahkan Anggota
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="bg-white rounded-4 shadow-sm overflow-hidden border border-light">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                                        <tr>
                                            <th class="ps-4 py-3 border-0">Anggota Tim</th>
                                            <th class="border-0">Kontak & Sosmed</th>
                                            <th class="text-end pe-4 border-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php if(!empty($teams)): ?>
                                            <?php foreach($teams as $team): ?>
                                            <tr class="border-bottom-0">
                                                <td class="ps-4 py-3">
                                                    <div class="d-flex align-items-center">
                                                        <img src="/img/team/<?= $team['foto']; ?>" width="50" height="50" class="rounded-circle object-fit-cover shadow-sm border border-2 border-white me-3" onerror="this.src='https://via.placeholder.com/50'">
                                                        <div>
                                                            <div class="fw-bold text-dark"><?= $team['nama']; ?></div>
                                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 fw-normal" style="font-size: 0.7rem;">
                                                                <?= $team['jabatan']; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <?php if(!empty($team['email'])): ?>
                                                            <a href="mailto:<?= $team['email']; ?>" class="btn btn-sm btn-light border rounded-circle text-success"><i class="bi bi-envelope-fill"></i></a>
                                                        <?php endif; ?>
                                                        <?php if(!empty($team['instagram'])): ?>
                                                            <a href="#" class="btn btn-sm btn-light border rounded-circle text-success"><i class="bi bi-instagram"></i></a>
                                                        <?php endif; ?>
                                                        <?php if(!empty($team['linkedin'])): ?>
                                                            <a href="#" class="btn btn-sm btn-light border rounded-circle text-success"><i class="bi bi-linkedin"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <button type="button" class="btn btn-light text-warning btn-sm rounded-circle shadow-sm border btn-edit-team" 
                                                            data-bs-toggle="modal" data-bs-target="#editTeamModal" data-id="<?= $team['id']; ?>" data-nama="<?= $team['nama']; ?>" 
                                                            data-jabatan="<?= $team['jabatan']; ?>" data-email="<?= $team['email']; ?>" data-instagram="<?= $team['instagram']; ?>" 
                                                            data-linkedin="<?= $team['linkedin']; ?>" data-foto="<?= $team['foto']; ?>">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                        <button onclick="confirmDelete('/admin/about/deleteTeam/<?= $team['id']; ?>', 'tim')" class="btn btn-light text-danger btn-sm rounded-circle shadow-sm border hover-danger">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="3" class="text-center py-5 text-muted">Belum ada anggota tim.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="mitra" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="bg-white p-4 rounded-4 shadow-sm border border-success border-opacity-10 h-100">
                            <h6 class="fw-bold mb-4 text-success border-bottom pb-2"><i class="bi bi-plus-circle-fill me-2"></i>Tambah Mitra Baru</h6>
                            
                            <form action="/admin/about/storeMitra" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Instansi/Perusahaan</label>
                                    <input type="text" name="nama" class="form-control bg-light border-0" required placeholder="Contoh: Dinas Pertanian">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted">Logo Mitra</label>
                                    <input type="file" name="logo" class="form-control bg-light border-0" required>
                                    <div class="form-text small">Disarankan format PNG transparan. Max 2MB.</div>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2 rounded-pill fw-bold shadow-sm hover-scale">
                                    <i class="bi bi-upload me-1"></i> Simpan Mitra
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="bg-white rounded-4 shadow-sm overflow-hidden border border-light">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                                        <tr>
                                            <th class="ps-4 py-3 border-0" style="width: 100px;">Logo</th>
                                            <th class="border-0">Nama Mitra</th>
                                            <th class="text-end pe-4 border-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php if(!empty($mitra)): ?>
                                            <?php foreach($mitra as $m): ?>
                                            <tr class="border-bottom-0">
                                                <td class="ps-4 py-3">
                                                    <div class="p-2 bg-light rounded border" style="width: 70px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                        <img src="/img/mitra/<?= $m['logo']; ?>" style="max-width: 100%; max-height: 100%;" onerror="this.src='https://via.placeholder.com/60x40'">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-bold text-dark"><?= $m['nama']; ?></div>
                                                    <small class="text-muted">Ditambahkan pada: <?= date('d M Y', strtotime($m['created_at'] ?? 'now')); ?></small>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button onclick="confirmDelete('/admin/about/deleteMitra/<?= $m['id']; ?>', 'mitra')" class="btn btn-light text-danger btn-sm rounded-circle shadow-sm border hover-danger">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center py-5 text-muted">
                                                    <div class="opacity-50 mb-2"><i class="bi bi-handshake display-4"></i></div>
                                                    <p class="mb-0">Belum ada data mitra strategis.</p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editTeamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header bg-white border-bottom-0">
                <h5 class="modal-title fw-bold text-success"><i class="bi bi-pencil-square me-2"></i>Edit Anggota Tim</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/about/updateTeam'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body p-4 pt-0">
                    <input type="hidden" name="id" id="edit_id">
                    <input type="hidden" name="foto_lama" id="edit_foto_lama">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                        <input type="text" name="nama" id="edit_nama" class="form-control bg-light border-0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Jabatan</label>
                        <input type="text" name="jabatan" id="edit_jabatan" class="form-control bg-light border-0" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-control bg-light border-0">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Instagram</label>
                            <input type="text" name="instagram" id="edit_instagram" class="form-control bg-light border-0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">LinkedIn</label>
                        <input type="text" name="linkedin" id="edit_linkedin" class="form-control bg-light border-0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Ganti Foto (Opsional)</label>
                        <div class="d-flex align-items-center gap-3">
                            <img src="" id="preview_foto" class="rounded-circle border shadow-sm" width="50" height="50" style="object-fit: cover;">
                            <input type="file" name="foto" class="form-control bg-light border-0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function setLastTab(tabName) {
        localStorage.setItem('lastActiveTabAbout', tabName);
        updatePageTitle(tabName);
    }

    function updatePageTitle(tabName) {
        const titleElement = document.getElementById('dynamic-title');
        if(titleElement) {
            if(tabName === 'tim') titleElement.textContent = 'Tim Manajemen';
            else if(tabName === 'mitra') titleElement.textContent = 'Mitra Strategis';
            else titleElement.textContent = 'Profil & Statistik';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        let lastTab = localStorage.getItem('lastActiveTabAbout') || 'profil';

        const tabs = document.querySelectorAll('#aboutTab button');
        const tabContents = document.querySelectorAll('.tab-pane');

        function activateTab(tabId) {
            tabs.forEach(t => {
                t.classList.remove('active');
                t.classList.add('text-secondary');
            });
            tabContents.forEach(c => c.classList.remove('show', 'active'));

            const selectedBtn = document.querySelector(`#${tabId}-tab`);
            const selectedContent = document.getElementById(tabId);

            if(selectedBtn && selectedContent) {
                selectedBtn.classList.remove('text-secondary');
                selectedBtn.classList.add('active');
                selectedContent.classList.add('show', 'active');
                updatePageTitle(tabId);
            }
        }

        activateTab(lastTab);

        // Flash Message Logic
        const flashSuccess = document.getElementById('flash-success');
        const flashError = document.getElementById('flash-error');
        if (flashSuccess) {
            Swal.fire({ icon: 'success', title: 'Berhasil!', text: flashSuccess.getAttribute('data-message'), timer: 2000, showConfirmButton: false, timerProgressBar: true });
        }
        if (flashError) {
            Swal.fire({ icon: 'error', title: 'Gagal!', text: flashError.getAttribute('data-message'), confirmButtonColor: '#d33' });
        }
    });

    function confirmDelete(url, tabAfter) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data ini tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33', 
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                setLastTab(tabAfter); 
                window.location.href = url;
            }
        });
    }

    // Modal Edit Team Logic
    const editModal = document.getElementById('editTeamModal');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            document.getElementById('edit_id').value = button.getAttribute('data-id');
            document.getElementById('edit_nama').value = button.getAttribute('data-nama');
            document.getElementById('edit_jabatan').value = button.getAttribute('data-jabatan');
            document.getElementById('edit_email').value = button.getAttribute('data-email');
            document.getElementById('edit_instagram').value = button.getAttribute('data-instagram');
            document.getElementById('edit_linkedin').value = button.getAttribute('data-linkedin');
            document.getElementById('edit_foto_lama').value = button.getAttribute('data-foto');
            document.getElementById('preview_foto').src = '/img/team/' + button.getAttribute('data-foto');
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>