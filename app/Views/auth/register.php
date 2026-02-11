<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Arif Agro Farm</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh; 
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1a1a1a; 
            overflow-x: hidden;
        }

        /* --- BACKGROUND SLIDESHOW --- */
        .bg-slider { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
        
        .bg-slide {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover; background-position: center;
            opacity: 0;
            animation: slideAnimation 18s infinite linear; 
        }

        /* saya mengambil gambar nya dari unsplash */
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
            width: 100%; 
            max-width: 420px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            position: relative; z-index: 1; 
            margin: 20px; 
        }

        .card-body { padding: 2rem; }

        .form-control {
            background: rgba(255, 255, 255, 0.9); border: 1px solid #ddd;
            border-radius: 10px; padding: 10px 12px; font-size: 0.9rem; transition: all 0.3s;
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

        .text-header { color: #1f2937; font-weight: 700; font-size: 1.5rem; }
        
        .link-login { color: #059669; font-weight: 600; transition: color 0.3s; }
        .link-login:hover { color: #047857; text-decoration: underline !important; }

        /* --- COPYRIGHT INSIDE CARD --- */
        .copyright-text {
            font-size: 0.7rem; 
            color: #6c757d; 
            margin-top: 1.2rem;
            text-align: center;
            border-top: 1px solid rgba(0,0,0,0.05); 
            padding-top: 10px;
        }
        
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
            <div class="text-center mb-3">
                <h3 class="text-header mb-1">Buat Akun</h3>
                <p class="text-muted small">Daftar untuk mengelola sistem</p>
            </div>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger p-2 small border-0 shadow-sm rounded-3 mb-3">
                    <ul class="mb-0 ps-3">
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/register/process" method="post">
                <div class="mb-2">
                    <label class="form-label small fw-bold text-secondary ps-1 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Anda" value="<?= old('nama'); ?>" required>
                </div>
                
                <div class="mb-2">
                    <label class="form-label small fw-bold text-secondary ps-1 mb-1">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="<?= old('email'); ?>" required>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-secondary ps-1 mb-1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-secondary ps-1 mb-1">Ulangi</label>
                        <input type="password" name="confpassword" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-green w-100 py-2 mb-3 shadow-sm">
                    Daftar Sekarang
                </button>
            </form>
            
            <div class="text-center small">
                Sudah punya akun? <a href="/login" class="link-login text-decoration-none">Login disini</a>
            </div>

            <div class="copyright-text">
                &copy; <?= date('Y'); ?> Arif Agro Farm. <br>
                Dibuat dengan <span class="heart-beat">❤️</span> sepenuh hati.
            </div>

        </div>
    </div>

</body>
</html>