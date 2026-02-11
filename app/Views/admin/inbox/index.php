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
    .hover-danger:hover { background-color: #dc3545 !important; color: white !important; }
    .letter-spacing-1 { letter-spacing: 1px; }
    
    .form-control:focus {
        background-color: #fff !important;
        border-color: #198754 !important;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1);
    }
</style>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kotak Masuk <span class="text-success">Pesan</span></h3>
        <p class="text-muted mb-0 small">Kelola pertanyaan dan pesan dari pengunjung website Anda secara real-time.</p>
    </div>
    <button class="btn btn-outline-success rounded-pill px-4 fw-bold shadow-sm hover-scale" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise me-2"></i> Refresh Inbox
    </button>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div id="flash-success" data-message="<?= session()->getFlashdata('success'); ?>"></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div id="flash-error" data-message="<?= session()->getFlashdata('error'); ?>"></div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-success bg-opacity-10 text-success small text-uppercase">
                <tr>
                    <th class="ps-4 py-3 border-0">Pengirim</th>
                    <th class="border-0">Subjek</th>
                    <th class="border-0">Waktu</th>
                    <th class="border-0">Status</th>
                    <th class="text-end pe-4 border-0">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php foreach($messages as $m): ?>
                
                <?php 
                    $mapSubjek = [
                        '1' => 'Pemesanan Produk',
                        '2' => 'Konsultasi Smart Farming',
                        '3' => 'Kerjasama Bisnis',
                        '4' => 'Lainnya'
                    ];
                    $displaySubjek = $mapSubjek[$m['subjek']] ?? $m['subjek'];
                ?>

                <tr class="<?= ($m['status'] == 'unread') ? 'bg-light bg-opacity-50' : ''; ?> transition-all">
                    <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-success bg-opacity-10 text-success p-2 me-3 d-none d-md-block">
                                <i class="bi <?= ($m['status'] == 'unread') ? 'bi-envelope-exclamation-fill' : 'bi-envelope-check'; ?>"></i>
                            </div>
                            <div>
                                <div class="<?= ($m['status'] == 'unread') ? 'fw-bold text-dark' : 'text-secondary'; ?>"><?= $m['nama']; ?></div>
                                <div class="small text-muted"><?= $m['email']; ?></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="d-inline-block text-truncate <?= ($m['status'] == 'unread') ? 'fw-bold text-dark' : 'text-muted'; ?>" style="max-width: 250px;">
                            <?= $displaySubjek; ?>
                        </span>
                    </td>
                    <td>
                        <div class="small text-muted">
                            <i class="bi bi-clock me-1"></i> <?= date('d M, H:i', strtotime($m['created_at'])); ?>
                        </div>
                    </td>
                    <td>
                        <?php 
                            $badges = [
                                'unread' => 'bg-danger',
                                'read' => 'bg-secondary',
                                'replied' => 'bg-success'
                            ];
                            $labels = [
                                'unread' => 'Pesan Baru',
                                'read' => 'Sudah Dibaca',
                                'replied' => 'Sudah Dibalas'
                            ];
                        ?>
                        <span class="badge <?= $badges[$m['status']]; ?> rounded-pill fw-bold" style="font-size: 0.65rem; padding: 0.5em 1em;">
                            <?= $labels[$m['status']]; ?>
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-sm btn-success rounded-pill px-3 fw-bold shadow-sm hover-scale" 
                                    onclick="bukaPesan(<?= $m['id']; ?>)">
                                <i class="bi bi-envelope-open me-1"></i> Baca
                            </button>
                            <button onclick="confirmDelete('/admin/inbox/delete/<?= $m['id']; ?>')" 
                                    class="btn btn-sm btn-light border text-danger rounded-circle shadow-sm hover-danger" 
                                    title="Hapus Pesan">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($messages)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="bi bi-inbox text-muted opacity-25" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-2">Kotak masuk Anda saat ini sedang kosong.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade animate__animated animate__fadeIn" id="readMessageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-success text-white border-0 py-3">
                <h5 class="modal-title fw-bold"><i class="bi bi-chat-left-text me-2"></i> Detail Pesan Masuk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="p-3 bg-light rounded-4 mb-4 border border-light">
                    <div class="row g-2 mb-2">
                        <div class="col-sm-2 text-muted small fw-bold">DARI</div>
                        <div class="col-sm-10 fw-bold text-dark" id="detailNama"></div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-sm-2 text-muted small fw-bold">EMAIL</div>
                        <div class="col-sm-10 text-primary" id="detailEmail"></div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-sm-2 text-muted small fw-bold">WAKTU</div>
                        <div class="col-sm-10 small text-muted" id="detailWaktu"></div>
                    </div>
                    <div class="row g-2">
                        <div class="col-sm-2 text-muted small fw-bold">SUBJEK</div>
                        <div class="col-sm-10 fw-bold text-success" id="detailSubjek"></div>
                    </div>
                </div>
                
                <h6 class="fw-bold mb-2 text-dark small text-uppercase letter-spacing-1">Isi Pesan:</h6>
                <div class="p-4 border border-light rounded-4 mb-4 bg-white shadow-sm" id="detailIsi" style="min-height: 120px; white-space: pre-wrap; font-size: 0.95rem; color: #444;"></div>

                <hr class="opacity-10">

                <h6 class="fw-bold mb-3 text-success"><i class="bi bi-reply-all-fill me-2"></i> Balas ke Email Pengirim</h6>
                <form action="/admin/inbox/reply" method="post" id="replyForm">
                    <input type="hidden" name="id" id="replyId">
                    <input type="hidden" name="email" id="replyEmail">
                    <input type="hidden" name="subjek" id="replySubjek">
                    
                    <div class="mb-3">
                        <textarea name="balasan" class="form-control bg-light border-0 rounded-4 p-3" rows="5" placeholder="Tulis balasan profesional Anda di sini..." required></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success fw-bold rounded-pill px-5 shadow-sm hover-scale">
                            <i class="bi bi-send-fill me-2"></i> Kirim Balasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Java Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const flashSuccess = document.getElementById('flash-success');
        const flashError = document.getElementById('flash-error');

        if (flashSuccess) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: flashSuccess.getAttribute('data-message'),
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true,
                confirmButtonColor: '#198754',
                customClass: { popup: 'rounded-4' }
            });
        }

        if (flashError) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: flashError.getAttribute('data-message'),
                confirmButtonColor: '#d33',
                customClass: { popup: 'rounded-4' }
            });
        }
    });

    // Buka Detail Pesan
    function bukaPesan(id) {
        Swal.fire({
            title: 'Memuat Pesan...',
            didOpen: () => { Swal.showLoading() },
            allowOutsideClick: false,
            showConfirmButton: false,
            customClass: { popup: 'rounded-4' }
        });

        fetch('/admin/inbox/detail/' + id)
            .then(response => response.json())
            .then(data => {
                Swal.close();
                const mapSubjek = {
                    '1': 'Pemesanan Produk',
                    '2': 'Konsultasi Smart Farming',
                    '3': 'Kerjasama Bisnis',
                    '4': 'Lainnya'
                };

                const subjekText = mapSubjek[data.subjek] || data.subjek;

                document.getElementById('detailNama').innerText = data.nama;
                document.getElementById('detailEmail').innerText = data.email;
                document.getElementById('detailWaktu').innerText = data.created_at;
                document.getElementById('detailSubjek').innerText = subjekText;
                
                document.getElementById('detailIsi').innerText = data.pesan;

                document.getElementById('replyId').value = data.id;
                document.getElementById('replyEmail').value = data.email;
                document.getElementById('replySubjek').value = subjekText;

                var myModal = new bootstrap.Modal(document.getElementById('readMessageModal'));
                myModal.show();
            });
    }

    function confirmDelete(url) {
        Swal.fire({
            title: 'Hapus Pesan?',
            text: "Pesan yang dihapus tidak dapat dipulihkan!",
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