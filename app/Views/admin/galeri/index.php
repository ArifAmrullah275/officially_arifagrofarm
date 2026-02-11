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
        <h3 class="fw-bold text-dark mb-1">Kelola <span class="text-success">Galeri Foto</span></h3>
        <p class="text-muted mb-0 small">Manajemen dokumentasi kegiatan, produk, dan teknologi perusahaan.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-success rounded-pill px-4 fw-bold shadow-sm hover-scale" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
            <i class="bi bi-plus-lg me-2"></i> Tambah Foto
        </button>
        <a href="/galeri" class="btn btn-outline-success rounded-pill px-3 shadow-sm hover-scale" target="_blank" title="Preview Website">
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
                    <th class="ps-4 py-3 border-0">Preview</th>
                    <th class="border-0">Informasi Foto</th>
                    <th class="border-0">Kategori</th>
                    <th class="border-0">Tgl Unggah</th>
                    <th class="text-end pe-4 border-0">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php foreach($galeri as $g): ?>
                <tr class="transition-all">
                    <td class="ps-4">
                        <img src="/img/galeri/<?= $g['gambar']; ?>" class="rounded-3 shadow-sm border" style="width: 80px; height: 60px; object-fit: cover;">
                    </td>
                    <td>
                        <div class="fw-bold text-dark fs-6"><?= $g['judul']; ?></div>
                        <small class="text-muted"><?= $g['gambar']; ?></small>
                    </td>
                    <td>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold text-uppercase" style="font-size: 0.65rem;">
                            <?= $g['kategori']; ?>
                        </span>
                    </td>
                    <td>
                        <div class="small text-muted">
                            <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($g['created_at'])); ?>
                        </div>
                    </td>
                    <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                            <button onclick="confirmDelete('/admin/galeri/hapus/<?= $g['id']; ?>', '<?= $g['judul']; ?>')" 
                                    class="btn btn-sm btn-light border text-danger rounded-circle shadow-sm hover-scale"
                                    style="width: 35px; height: 35px;"
                                    title="Hapus Foto">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php if(empty($galeri)): ?>
            <div class="text-center py-5">
                <i class="bi bi-images text-muted opacity-25" style="font-size: 4rem;"></i>
                <p class="text-muted mt-2">Belum ada koleksi foto tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade animate__animated animate__fadeIn" id="addGalleryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
            <form action="/admin/galeri/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-header bg-success text-white border-bottom-0 py-3">
                    <h5 class="modal-title fw-bold"><i class="bi bi-image-fill me-2"></i> Unggah Foto Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Judul Foto / Kegiatan</label>
                            <input type="text" name="judul" class="form-control bg-light border-0" placeholder="Masukkan judul foto..." required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Kategori</label>
                            <select name="kategori" class="form-select bg-light border-0" required>
                                <option value="" selected disabled>Pilih Kategori...</option>
                                <option value="kegiatan">Kegiatan</option>
                                <option value="produk">Produk</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="teknologi">Lahan Pertanian</option>
                                <option value="teknologi">Kantor</option>
                                <option value="teknologi">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">File Gambar (Maks 2MB)</label>
                            <input type="file" name="gambar" class="form-control bg-light border-0" accept="image/*" onchange="previewImage(this)" required>
                            <div class="mt-3 text-center">
                                <img id="imgPreview" src="#" alt="Preview" class="img-fluid rounded-3 shadow-sm d-none" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pb-4 px-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm">Mulai Unggah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Preview Gambar sebelum upload
    function previewImage(input) {
        const preview = document.getElementById('imgPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // 1. Alert Sukses
        const flashSuccess = document.getElementById('flash-success');
        if (flashSuccess) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: flashSuccess.getAttribute('data-message'),
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true,
                customClass: { popup: 'rounded-4' }
            });
        }
    });

    // 2. Konfirmasi Hapus
    function confirmDelete(url, title) {
        Swal.fire({
            title: 'Hapus Foto?',
            text: `Anda akan menghapus "${title}". File gambar di server juga akan dihapus!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: { popup: 'rounded-4' }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

<!-- Footer -->
<?= $this->endSection(); ?>