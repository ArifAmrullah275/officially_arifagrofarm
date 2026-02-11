<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Arif Agro Farm</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1a1a1a; 
        }

        /* --- BACKGROUND SLIDESHOW --- */
        .bg-slider { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
        
        .bg-slide {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover; background-position: center;
            opacity: 0;
            animation: slideAnimation 18s infinite linear; 
        }

        /* Backgorund nya saya mengambil dari unsplash */
        .bg-slide:nth-child(1) { background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1920&auto=format&fit=crop'); animation-delay: 0s; }
        .bg-slide:nth-child(2) { background-image: url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?q=80&w=1920&auto=format&fit=crop'); animation-delay: 6s; }
        .bg-slide:nth-child(3) { background-image: url('https://images.unsplash.com/photo-1495107334309-fcf20504a5ab?q=80&w=1920&auto=format&fit=crop'); animation-delay: 12s; }

        @keyframes slideAnimation {
            0% { opacity: 0; transform: scale(1); }
            5% { opacity: 1; }
            33% { opacity: 1; }
            38% { opacity: 0; transform: scale(1.1); }
            100% { opacity: 0; transform: scale(1); }
        }

        .bg-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4); z-index: 0;
        }

        /* --- CARD STYLE --- */
        .card-auth {
            width: 100%; max-width: 420px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            position: relative; z-index: 1; padding: 10px;
        }

        .card-body { padding: 2rem; }

        .form-control {
            background: rgba(255, 255, 255, 0.9); border: 1px solid #ddd;
            border-radius: 10px; padding: 12px; font-size: 0.95rem; transition: all 0.3s;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2); border-color: #10b981; background: #fff;
        }

        .btn-green {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none; color: white; font-weight: 600; border-radius: 10px;
            font-size: 1rem; transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-green:hover {
            transform: translateY(-2px); box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4); color: white;
        }

        .text-header { color: #1f2937; font-weight: 700; }
        
        .link-register { color: #059669; font-weight: 600; transition: color 0.3s; }
        .link-register:hover { color: #047857; text-decoration: underline !important; }

        /* --- COPYRIGHT INSIDE CARD --- */
        .copyright-text {
            font-size: 0.75rem;
            color: #6c757d; 
            margin-top: 2rem;
            text-align: center;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 15px;
        }
        
        /* Animasi detak jantung bg */
        .heart-beat {
            color: #ff4757;
            display: inline-block;
            animation: heartbeat 1.5s infinite;
        }

        @keyframes heartbeat {
            0% { transform: scale(1); }
            25% { transform: scale(1.2); }
            50% { transform: scale(1); }
            75% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>

    <div class="bg-slider">
        <div class="bg-slide"></div> <div class="bg-slide"></div> <div class="bg-slide"></div>
    </div>
    <div class="bg-overlay"></div>

    <div class="card card-auth animate-up">
        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="text-header mb-1">Arif Agro Farm</h3>
                <p class="text-muted small">Silakan login untuk mengelola sistem</p>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center p-2 small border-0 shadow-sm rounded-3">
                    <i class="bi bi-exclamation-circle me-1"></i> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success text-center p-2 small border-0 shadow-sm rounded-3">
                    <i class="bi bi-check-circle me-1"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="/login/process" method="post">
                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary ps-1">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold text-secondary ps-1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn btn-green w-100 py-2.5 mb-3 shadow-sm">
                    Masuk Sekarang
                </button>
            </form>
            
            <div class="text-center small mt-4">
                Belum memiliki akun? <a href="/register" class="link-register text-decoration-none">Daftar disini</a>
            </div>

            <div class="copyright-text">
                &copy; <?= date('Y'); ?> Arif Agro Farm. <br>
                Dibuat dengan <span class="heart-beat">❤️</span> sepenuh hati.
            </div>

        </div>
    </div>

</body>
</html>