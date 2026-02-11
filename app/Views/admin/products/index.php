<!-- Header -->
<?= $this->extend('admin/layout/template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- CSS -->
<style>
    .transition-all { transition: all 0.3s ease; }
 
    .product-row:hover { background-color: rgba(25, 135, 84, 0.05) !important; transform: translateX(5px); }
    
    .hover-scale:hover { transform: scale(1.05); transition: 0.2s; }
    .hover-rotate:hover { transform: rotate(15deg); transition: 0.2s; }
    
    .form-control:focus, .form-select:focus { 
        border: 1px solid #198754 !important; 
        background-color: #fff !important; 
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1); 
    }
</style>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h3 class="fw-bold text-dark mb-1">Manajemen <span class="text-success">Produk</span></h3>
        <p class="text-muted mb-0 small">Kelola katalog, harga, dan stok produk Anda di sini.</p>
    </div>
    
    <div class="d-flex align-items-center gap-2 bg-white p-2 rounded-pill shadow-sm border border-light">
        <div class="input-group input-group-sm" style="width: 220px;">
            <span class="input-group-text bg-white border-0 ps-3 text-success"><i class="bi bi-funnel-fill"></i></span>
            <select id="categoryFilter" class="form-select border-0 bg-transparent shadow-none fw-bold text-secondary" style="cursor: pointer;">
                <option value="all">Semua Kategori</option>
                <option value="sayuran">Sayuran</option>
                <option value="buah">Buah</option>
                <option value="bibit">Bibit</option>
                <option value="alsintan">Alsintan</option>
            </select>
        </div>

        <div class="vr mx-1 bg-secondary opacity-25"></div>

        <button class="btn btn-success rounded-pill px-4 btn-sm fw-bold d-flex align-items-center shadow-sm hover-scale" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-lg me-2"></i> Tambah
        </button>
        
        <a href="/produk" class="btn btn-light rounded-circle btn-sm shadow-sm border hover-rotate text-success" target="_blank" title="Lihat Website" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
            <i class="bi bi-box-arrow-up-right"></i>
        </a>
    </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div id="flash-error" data-message="<?= session()->getFlashdata('error'); ?>"></div>
<?php endif; ?>

<div class="card card-custom border-0 shadow-sm overflow-hidden rounded-4 border-top border-4 border-success">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="productTable">
            <thead class="bg-success text-white small text-uppercase">
                <tr>
                    <th class="ps-4 py-3 fw-bold border-bottom-0" style="width: 40%;">Info Produk</th>
                    <th class="fw-bold border-bottom-0">Kategori</th>
                    <th class="fw-bold border-bottom-0">Harga / Label</th>
                    <th class="text-end pe-4 fw-bold border-bottom-0">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php if(!empty($products)): ?>
                    <?php foreach($products as $p): ?>
                    <tr class="product-row border-bottom transition-all" data-category="<?= $p['kategori']; ?>">
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="position-relative me-3">
                                    <img src="/img/products/<?= $p['foto']; ?>" width="70" height="70" class="rounded-3 object-fit-cover shadow-sm border border-light" onerror="this.src='https://via.placeholder.com/70?text=IMG'">
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1"><?= $p['nama_produk']; ?></h6>
                                    <p class="small text-muted text-truncate mb-0" style="max-width: 250px; line-height: 1.3;"><?= $p['deskripsi']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php 
                                // Logic Badge Kategori
                                $badges = [
                                    'sayuran' => ['bg-success bg-opacity-10', 'text-success'],
                                    'buah' => ['bg-warning bg-opacity-10', 'text-warning'],
                                    'bibit' => ['bg-info bg-opacity-10', 'text-info'],
                                    'alsintan' => ['bg-dark bg-opacity-10', 'text-dark']
                                ];
                                $bgClass = $badges[$p['kategori']][0] ?? 'bg-secondary bg-opacity-10';
                                $textClass = $badges[$p['kategori']][1] ?? 'text-secondary';
                            ?>
                            <span class="badge <?= $bgClass . ' ' . $textClass; ?> rounded-pill px-3 py-2 fw-bold text-uppercase border border-light" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                <?= $p['kategori']; ?>
                            </span>
                        </td>
                        <td>
                            <?php if($p['harga_label']): ?>
                                <span class="fw-bold text-dark font-monospace"><?= $p['harga_label']; ?></span>
                            <?php else: ?>
                                <span class="text-muted small fst-italic">-</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-sm btn-light border border-warning text-warning shadow-sm rounded-circle hover-scale" 
                                        style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal<?= $p['id']; ?>" title="Edit">
                                    <i class="bi bi-pencil-fill" style="font-size: 0.8rem;"></i>
                                </button>
                                
                                <button onclick="confirmDelete('/admin/products/delete/<?= $p['id']; ?>', '<?= $p['nama_produk']; ?>')" 
                                        class="btn btn-sm btn-light border border-danger text-danger shadow-sm rounded-circle hover-scale" 
                                        style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"
                                        title="Hapus">
                                    <i class="bi bi-trash-fill" style="font-size: 0.8rem;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal<?= $p['id']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                                <div class="modal-header bg-white border-bottom-0 py-3">
                                    <h5 class="modal-title fw-bold text-success"><i class="bi bi-pencil-square me-2"></i> Edit Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="/admin/products/update" method="post" enctype="multipart/form-data">
                                    <div class="modal-body p-4 pt-0">
                                        <input type="hidden" name="id" value="<?= $p['id']; ?>">
                                        <input type="hidden" name="foto_lama" value="<?= $p['foto']; ?>">
                                        
                                        <div class="mb-3">
                                            <label class="form-label small fw-bold text-muted text-uppercase">Nama Produk</label>
                                            <input type="text" name="nama_produk" class="form-control bg-light border-0" value="<?= $p['nama_produk']; ?>" required>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label small fw-bold text-muted text-uppercase">Kategori</label>
                                                <select name="kategori" class="form-select bg-light border-0" required>
                                                    <option value="sayuran" <?= ($p['kategori']=='sayuran')?'selected':''; ?>>Sayuran</option>
                                                    <option value="buah" <?= ($p['kategori']=='buah')?'selected':''; ?>>Buah</option>
                                                    <option value="bibit" <?= ($p['kategori']=='bibit')?'selected':''; ?>>Bibit</option>
                                                    <option value="alsintan" <?= ($p['kategori']=='alsintan')?'selected':''; ?>>Alsintan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label small fw-bold text-muted text-uppercase">Label Harga</label>
                                                <input type="text" name="harga_label" class="form-control bg-light border-0" value="<?= $p['harga_label']; ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold text-muted text-uppercase">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control bg-light border-0" rows="3"><?= $p['deskripsi']; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold text-muted text-uppercase">Ganti Foto</label>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="/img/products/<?= $p['foto']; ?>" class="rounded shadow-sm border" width="50" height="50" onerror="this.src='https://via.placeholder.com/50'">
                                                <input type="file" name="foto" class="form-control bg-light border-0">
                                            </div>
                                            <div class="form-text small mt-1">Biarkan kosong jika tidak ingin mengganti.</div>
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label class="form-label small fw-bold text-muted text-uppercase">Link Aksi</label>
                                            <input type="text" name="link_aksi" class="form-control bg-light border-0" value="<?= $p['link_aksi']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 pt-0 pb-4 px-4">
                                        <button type="button" class="btn btn-light text-muted fw-bold rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success fw-bold rounded-pill px-4 shadow-sm">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr id="emptyRow">
                        <td colspan="4" class="text-center py-5 text-muted">Belum ada data produk.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div id="noDataMessage" class="text-center py-5 d-none animate__animated animate__fadeIn">
            <div class="text-muted opacity-25 mb-3 display-1"><i class="bi bi-search"></i></div>
            <h6 class="fw-bold text-muted">Tidak ada produk dalam kategori ini.</h6>
        </div>
    </div>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-white border-bottom-0 py-3">
                <h5 class="modal-title fw-bold text-success"><i class="bi bi-plus-circle me-2"></i> Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/products/store" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4 pt-0">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama_produk" class="form-control bg-light border-0" placeholder="Contoh: Pakcoy Hidroponik" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select bg-light border-0" required>
                                <option value="" selected disabled>Pilih...</option>
                                <option value="sayuran">Sayuran</option>
                                <option value="buah">Buah</option>
                                <option value="bibit">Bibit</option>
                                <option value="alsintan">Alsintan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase">Label Harga</label>
                            <input type="text" name="harga_label" class="form-control bg-light border-0" placeholder="Contoh: Rp 15.000 / pack">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Deskripsi Singkat <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="form-control bg-light border-0" rows="3" placeholder="Deskripsi produk..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Foto Produk <span class="text-danger">*</span></label>
                        <input type="file" name="foto" class="form-control bg-light border-0" required>
                    </div>
                    
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted text-uppercase">Link Tombol Aksi</label>
                        <input type="text" name="link_aksi" class="form-control bg-light border-0" value="/kontak">
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light text-muted fw-bold rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success fw-bold rounded-pill px-4 shadow-sm">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. SWEETALERT
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

        // 2. FILTER KATEGORI LOGIC
        const filterSelect = document.getElementById('categoryFilter');
        const rows = document.querySelectorAll('.product-row');
        const noDataMsg = document.getElementById('noDataMessage');

        filterSelect.addEventListener('change', function() {
            const selectedCategory = this.value;
            let visibleCount = 0;

            rows.forEach(row => {
                const category = row.getAttribute('data-category');
                
                // Animasi sederhana saat filter
                if (selectedCategory === 'all' || category === selectedCategory) {
                    row.style.display = ''; 
                    row.classList.add('animate__animated', 'animate__fadeIn');
                    visibleCount++;
                } else {
                    row.style.display = 'none'; 
                    row.classList.remove('animate__animated', 'animate__fadeIn');
                }
            });

            // Tampilkan pesan jika tidak ada data
            if (visibleCount === 0) {
                noDataMsg.classList.remove('d-none');
            } else {
                noDataMsg.classList.add('d-none');
            }
        });
    });

    // 3. SWEETALERT KONFIRMASI HAPUS
    function confirmDelete(url, namaProduk) {
        Swal.fire({
            title: 'Hapus Produk?',
            text: "Produk '" + namaProduk + "' akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
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