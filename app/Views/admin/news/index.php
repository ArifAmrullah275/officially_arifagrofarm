<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola <span class="text-success">Berita & Artikel</span></h3>
        <p class="text-muted mb-0 small">Pastikan kategori & tags sesuai untuk fungsi filter di halaman pengunjung.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="/berita" class="btn btn-outline-success rounded-pill px-4 btn-sm fw-bold d-flex align-items-center shadow-sm hover-scale" target="_blank">
            <i class="bi bi-eye me-2"></i> Lihat Live Website
        </a>
    </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
            <div class="card-header bg-white border-bottom-0 p-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-success"><i class="bi bi-newspaper me-2"></i> Manajemen Konten</h5>
                <button class="btn btn-success btn-sm rounded-pill px-3 fw-bold shadow-sm hover-scale" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                    <i class="bi bi-plus-lg me-1"></i> Tulis Berita Baru
                </button>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                            <tr>
                                <th class="ps-4 py-3 border-0">Informasi Berita</th>
                                <th class="border-0">Kategori</th>
                                <th class="border-0">Tanggal</th>
                                <th class="text-end pe-4 border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <?php if(!empty($news)): foreach($news as $n): ?>
                            <tr class="transition-all hover-bg-light">
                                <td class="ps-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <img src="/img/news/<?= $n['foto']; ?>" width="60" height="60" class="rounded-3 object-fit-cover shadow-sm border me-3" onerror="this.src='https://via.placeholder.com/60'">
                                        <div>
                                            <div class="fw-bold text-dark text-truncate" style="max-width: 250px;"><?= $n['judul']; ?></div>
                                            <div class="small text-muted mt-1">
                                                <i class="bi bi-tags-fill text-success me-1"></i>
                                                <span class="badge bg-light text-dark border-0 p-0"><?= $n['tags']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php 
                                        $catColor = [
                                            'edukasi' => 'bg-info',
                                            'info-pasar' => 'bg-warning',
                                            'kegiatan' => 'bg-success',
                                            'tips' => 'bg-primary'
                                        ];
                                        $color = $catColor[$n['kategori']] ?? 'bg-secondary';
                                    ?>
                                    <span class="badge <?= $color; ?> bg-opacity-10 <?= str_replace('bg', 'text', $color); ?> rounded-pill px-3 py-2 fw-bold text-uppercase border-0" style="font-size: 0.65rem;">
                                        <?= str_replace('-', ' ', $n['kategori']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="small fw-bold text-dark"><?= date('d/m/Y', strtotime($n['tanggal'])); ?></div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button class="btn btn-sm btn-light border border-warning text-warning rounded-circle hover-scale" data-bs-toggle="modal" data-bs-target="#editNewsModal<?= $n['id']; ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button onclick="confirmDelete('/admin/news/deleteNews/<?= $n['id']; ?>', 'berita')" class="btn btn-sm btn-light border border-danger text-danger rounded-circle hover-scale">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="editNewsModal<?= $n['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-4">
                                        <div class="modal-header border-0 p-4 pb-0">
                                            <h5 class="fw-bold text-success"><i class="bi bi-pencil-square me-2"></i>Edit Artikel</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="/admin/news/updateNews" method="post" enctype="multipart/form-data">
                                            <div class="modal-body p-4">
                                                <input type="hidden" name="id" value="<?= $n['id']; ?>">
                                                <div class="row g-3">
                                                    <div class="col-md-8">
                                                        <label class="form-label fw-bold small">Judul Artikel</label>
                                                        <input type="text" name="judul" class="form-control bg-light border-0" value="<?= $n['judul']; ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label fw-bold small">Tanggal Tayang</label>
                                                        <input type="date" name="tanggal" class="form-control bg-light border-0" value="<?= $n['tanggal']; ?>" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold small">Kategori (Sesuai Filter Front-end)</label>
                                                        <select name="kategori" class="form-select bg-light border-0" required>
                                                            <option value="edukasi" <?= ($n['kategori']=='edukasi')?'selected':''; ?>>Edukasi</option>
                                                            <option value="info-pasar" <?= ($n['kategori']=='info-pasar')?'selected':''; ?>>Info Pasar</option>
                                                            <option value="kegiatan" <?= ($n['kategori']=='kegiatan')?'selected':''; ?>>Kegiatan Perusahaan</option>
                                                            <option value="tips" <?= ($n['kategori']=='tips')?'selected':''; ?>>Tips & Trik</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold small">Tags (Pisahkan dengan koma)</label>
                                                        <input type="text" name="tags" class="form-control bg-light border-0" value="<?= $n['tags']; ?>" placeholder="contoh: organik, hidroponik">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold small">Konten Singkat (Muncul di Card)</label>
                                                        <textarea name="konten_singkat" class="form-control bg-light border-0" rows="3"><?= $n['konten_singkat']; ?></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold small">Ganti Foto Utama</label>
                                                        <input type="file" name="foto" class="form-control bg-light border-0">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold small">ID Detail (Link Baca)</label>
                                                        <input type="text" name="link_baca" class="form-control bg-light border-0" value="<?= $n['link_baca']; ?>" placeholder="default: #">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 p-4 pt-0">
                                                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; else: ?>
                                <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada data berita.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-header bg-white border-bottom-0 p-4">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-megaphone-fill me-2 text-warning"></i> Pengumuman</h5>
                <p class="text-muted small mb-0">Muncul di sidebar halaman berita.</p>
            </div>
            <div class="card-body p-4 pt-0">
                <form action="/admin/news/storeAnn" method="post" class="p-3 rounded-4 border border-warning border-opacity-25 bg-warning bg-opacity-10 mb-4">
                    <h6 class="fw-bold text-warning mb-3 small">TAMBAH BARU</h6>
                    
                    <label class="small text-muted">Judul:</label>
                    <input type="text" name="judul" class="form-control form-control-sm border-0 shadow-sm mb-2" placeholder="Judul info singkat..." required>
                    
                    <label class="small text-muted">Tanggal Terbit:</label>
                    <input type="date" name="tanggal" class="form-control form-control-sm border-0 shadow-sm mb-2" required>

                    <label class="small text-muted fw-bold text-danger">Tampil Sampai:</label>
                    <input type="date" name="expired_at" class="form-control form-control-sm border-0 shadow-sm mb-2" required>
                    <button type="submit" class="btn btn-warning btn-sm w-100 fw-bold rounded-pill text-white shadow-sm">Publish Pengumuman</button>
                </form>

                <div class="announcement-list">
                    <?php if(!empty($announcements)): foreach($announcements as $a): ?>
                    <div class="d-flex justify-content-between align-items-start mb-3 pb-2 border-bottom border-light">
                        <div>
                            <div class="fw-bold text-dark small mb-1"><?= $a['judul']; ?></div>
                            <small class="text-muted"><i class="bi bi-clock me-1"></i> <?= date('d M Y', strtotime($a['tanggal'])); ?></small>
                        </div>
                        <button onclick="confirmDelete('/admin/news/deleteAnn/<?= $a['id']; ?>', 'pengumuman')" class="btn btn-sm text-danger opacity-50 hover-opacity-100 p-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    <?php endforeach; else: ?>
                        <div class="text-center py-3 small text-muted">Tidak ada pengumuman aktif.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-success text-white py-3 border-0">
                <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle me-2"></i> Tulis Berita Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/news/storeNews" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-bold small">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control bg-light border-0 shadow-none" placeholder="Masukkan judul menarik..." required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold small">Tanggal Tayang</label>
                            <input type="date" name="tanggal" class="form-control bg-light border-0 shadow-none" value="<?= date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Kategori Berita</label>
                            <select name="kategori" class="form-select bg-light border-0 shadow-none" required>
                                <option value="edukasi">Edukasi</option>
                                <option value="info-pasar">Info Pasar</option>
                                <option value="kegiatan" selected>Kegiatan Perusahaan</option>
                                <option value="tips">Tips & Trik</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Tags (Pisahkan dengan koma)</label>
                            <input type="text" name="tags" class="form-control bg-light border-0 shadow-none" placeholder="cth: organik, panen, subang">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small">Konten</label>
                            <textarea name="konten_singkat" class="form-control bg-light border-0 shadow-none" rows="3" placeholder="Isi Berita" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Foto Unggulan</label>
                            <input type="file" name="foto" class="form-control bg-light border-0 shadow-none" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Slug/Link Berita</label>
                            <input type="text" name="link_baca" class="form-control bg-light border-0 shadow-none" value="#" placeholder="Contoh: berita-iot-pertanian">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success fw-bold rounded-pill px-4 shadow-sm">Publish Berita</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .hover-bg-light:hover { background-color: rgba(25, 135, 84, 0.04) !important; }
    .transition-all { transition: all 0.3s ease; }
    .hover-scale:hover { transform: translateY(-2px); transition: 0.2s; }
    .form-control:focus, .form-select:focus { 
        border: 1px solid var(--primary-green) !important; 
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1) !important; 
        background-color: #fff !important;
    }
</style>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const flashSuccess = document.getElementById('flash-success');
        if (flashSuccess) {
            Swal.fire({
                icon: 'success', title: 'Berhasil!', text: flashSuccess.getAttribute('data-message'),
                timer: 2000, showConfirmButton: false, timerProgressBar: true,
                confirmButtonColor: '#198754', customClass: { popup: 'rounded-4' }
            });
        }
    });

    function confirmDelete(url, type) {
        Swal.fire({
            title: 'Hapus ' + type + '?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: { popup: 'rounded-4 shadow-lg', confirmButton: 'rounded-pill px-4', cancelButton: 'rounded-pill px-4' }
        }).then((result) => {
            if (result.isConfirmed) { window.location.href = url; }
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>