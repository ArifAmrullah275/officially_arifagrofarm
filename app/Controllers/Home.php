<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\AboutProfileModel;
use App\Models\ServiceListModel;
use App\Models\ProductModel;
use App\Models\NewsModel;
use App\Models\OrderModel;
use App\Models\AboutTeamModel;
use App\Models\ServiceStatsModel;
use App\Models\AnnouncementModel;
use App\Models\CareerModel;
use App\Models\AboutMitraModel; 
use App\Models\GaleriModel;

class Home extends BaseController
{
    // 1. BERANDA
    public function index()
    {
        $aboutModel   = new AboutProfileModel();
        $serviceModel = new ServiceListModel();
        $productModel = new ProductModel();
        $newsModel    = new NewsModel();

        $data = [
            'title'       => 'Beranda | PT. Arif Agro Farm',
            'active'      => 'beranda',
            'profile'     => $aboutModel->first(),
            'services'    => $serviceModel->findAll(3), 
            'products'    => $productModel->orderBy('created_at', 'DESC')->findAll(4), 
            'latest_news' => $newsModel->orderBy('tanggal', 'DESC')->first() 
        ];

        return view('pages/beranda', $data);
    }

    // 2. TENTANG KAMI
    public function tentang()
    {
        $profileModel = new AboutProfileModel();
        $teamModel    = new AboutTeamModel();
        $mitraModel   = new AboutMitraModel(); 

        $profil    = $profileModel->first();
        // Memecah string misi menjadi array jika ada datanya
        $arrayMisi = $profil ? explode('|', $profil['misi']) : [];

        $data = [
            'title'   => 'Tentang Kami | PT. Arif Agro Farm',
            'active'  => 'tentang',
            'profile' => $profil,
            'misi'    => $arrayMisi,
            'teams'   => $teamModel->findAll(4),
            'mitra'   => $mitraModel->findAll()  
        ];

        return view('pages/tentang', $data);
    }

    // 3. SEMUA TIM
    public function tim()
    {
        $teamModel = new AboutTeamModel();
        $data = [
            'title'  => 'Tim Kami Lengkap | PT. Arif Agro Farm',
            'active' => 'tentang',
            'teams'  => $teamModel->findAll()
        ];
        return view('pages/team_all', $data);
    }

    // 4. LAYANAN
    public function layanan()
    {
        $statsModel = new ServiceStatsModel();
        $listModel  = new ServiceListModel();

        $data = [
            'title'    => 'Layanan Kami | PT. Arif Agro Farm',
            'active'   => 'layanan',
            'stats'    => $statsModel->first(),
            'services' => $listModel->findAll()
        ];
        return view('pages/layanan', $data);
    }

    // 5. PRODUK
    public function produk()
    {
        $productModel = new ProductModel();
        $data = [
            'title'    => 'Produk Kami | PT. Arif Agro Farm',
            'active'   => 'produk',
            'products' => $productModel->findAll()
        ];
        return view('pages/produk', $data);
    }

    // 6. BERITA & PENGUMUMAN (LIST)
    public function berita()
    {
        $newsModel = new NewsModel();
        $annModel  = new AnnouncementModel();

        $today = date('Y-m-d');

        $data = [
            'title'  => 'Berita & Artikel | Arif Agro Farm',
            'active' => 'berita',
            'news'   => $newsModel->orderBy('tanggal', 'DESC')->findAll(),
            // Filter: Hanya tampilkan pengumuman yang belum kadaluarsa
            'announcements' => $annModel->where('expired_at >=', $today)
                                        ->orderBy('tanggal', 'DESC')
                                        ->findAll()
        ];

        return view('pages/berita', $data);
    }

    // 7. DETAIL BERITA
    public function newsDetail($id)
    {
        $newsModel = new NewsModel();
        $annModel  = new AnnouncementModel();

        $news = $newsModel->find($id);
        
        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'         => $news['judul'] . ' | Arif Agro Farm',
            'active'        => 'berita',
            'news'          => $news,
            'announcements' => $annModel->where('expired_at >=', date('Y-m-d'))
                                        ->orderBy('tanggal', 'DESC')
                                        ->findAll()
        ];

        return view('pages/news_detail', $data);
    }

    // 8. DETAIL PENGUMUMAN
    public function announcementDetail($id)
    {
        $annModel = new AnnouncementModel();
        $announcement = $annModel->find($id);

        if (!$announcement) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'         => $announcement['judul'] . ' | Pengumuman Arif Agro Farm',
            'active'        => 'berita',
            'ann'           => $announcement,
            'announcements' => $annModel->where('expired_at >=', date('Y-m-d'))
                                        ->orderBy('tanggal', 'DESC')
                                        ->findAll()
        ];

        return view('pages/announcement_detail', $data);
    }

    // 9. KARIR
    public function karir()
    {
        $careerModel = new CareerModel();
        
        // Mengambil tanggal hari ini (Format: YYYY-MM-DD)
        $today = date('Y-m-d'); 

        $data = [
            'title'   => 'Karir & Lowongan | PT. Arif Agro Farm',
            'active'  => 'karir',
            'careers' => $careerModel->where('batas_lamaran >=', $today)
                                     ->orderBy('batas_lamaran', 'ASC') 
                                     ->findAll()
        ];

        return view('pages/karir', $data);
    }

    // --- FUNGSI GALERI BARU ---
    public function galeri()
    {
        $galeriModel = new GaleriModel();
        
        $data = [
            'title'  => 'Galeri | PT. Arif Agro Farm',
            'active' => 'galeri',
            'galeri' => $galeriModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('pages/galeri', $data);
    }

    public function submitLamaran()
    {
        $appModel = new \App\Models\ApplicationModel();

        // 1. Validasi Input & File
        $validationRule = [
            'cv' => [
                'label' => 'CV File',
                'rules' => 'uploaded[cv]|max_size[cv,2048]|ext_in[cv,pdf]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('error', 'Gagal: File harus PDF dan maksimal 2MB.');
        }

        // 2. Proses Upload File
        $fileCV = $this->request->getFile('cv');
        if ($fileCV->isValid() && !$fileCV->hasMoved()) {
            $newName = $fileCV->getRandomName();
            $fileCV->move(ROOTPATH . 'public/uploads/cv/', $newName);

            // 3. Simpan ke Database
            $appModel->save([
                'career_id'    => $this->request->getPost('career_id'),
                'nama_pelamar' => $this->request->getPost('nama'),
                'email'        => $this->request->getPost('email'),
                'telepon'      => $this->request->getPost('telepon'),
                'file_cv'      => $newName,
                'status'       => 'pending'
            ]);

            return redirect()->to('/karir')->with('success', 'Lamaran Anda berhasil terkirim! Kami akan menghubungi Anda melalui Email/WA.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah file.');
    }

    // 10. KONTAK (Form View)
    public function kontak()
    {
        $data = [
            'title'  => 'Hubungi Kami | PT. Arif Agro Farm',
            'active' => 'kontak'
        ];
        return view('pages/kontak', $data);
    }

    // 11. KIRIM PESAN (Action)
    public function kirimPesan()
    {
        // 1. Ambil input dan simpan ke database
        $model = new \App\Models\MessageModel();
        
        $save = $model->save([
            'nama'   => $this->request->getPost('nama'),
            'email'  => $this->request->getPost('email'),
            'subjek' => $this->request->getPost('subjek'),
            'pesan'  => $this->request->getPost('pesan'),
            'status' => 'unread'
        ]);

        if ($save) {
            // 2. Jika berhasil, arahkan KEMBALI ke halaman kontak
            return redirect()->to('/kontak')->with('success', 'Pesan Anda telah berhasil dikirim!');
        } else {
            return redirect()->to('/kontak')->with('error', 'Gagal mengirim pesan, silakan coba lagi.');
        }
    }

    // Form Pemesanan Produk
    public function formPesan($id)
    {
        $productModel = new ProductModel();
        $product      = $productModel->find($id);

        if (!$product) {
            return redirect()->to('/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $data = [
            'title'   => 'Konfirmasi Pesanan - ' . $product['nama_produk'],
            'active'  => 'produk',
            'product' => $product
        ];

        return view('pages/pesan_produk', $data);
    }

    // Submit Pesanan
    public function submitPesan()
    {
        $orderModel = new OrderModel();

        if (!$this->validate([
            'product_id'   => 'required',
            'nama_pemesan' => 'required',
            'no_hp'        => 'required|numeric',
            'alamat'       => 'required',
            'jumlah'       => 'required|numeric|greater_than[0]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Harap lengkapi semua data dengan benar.');
        }

        $orderModel->save([
            'product_id'   => $this->request->getPost('product_id'),
            'nama_pemesan' => $this->request->getPost('nama_pemesan'),
            'no_hp'        => $this->request->getPost('no_hp'),
            'alamat'       => $this->request->getPost('alamat'),
            'jumlah'       => $this->request->getPost('jumlah'),
            'catatan'      => $this->request->getPost('catatan'),
            'status'       => 'pending' 
        ]);

        $orderId = $orderModel->insertID();
        return redirect()->to('/pesan/sukses/' . $orderId);
    }

    // Halaman Sukses Pesan
    public function pesanSukses($id)
    {
        $orderModel = new OrderModel();
        $order = $orderModel->select('orders.*, products.nama_produk, products.harga_label')
                            ->join('products', 'products.id = orders.product_id')
                            ->find($id);

        if (!$order) return redirect()->to('/produk');

        $data = [
            'title'  => 'Pesanan Berhasil | PT. Arif Agro Farm',
            'active' => 'produk',
            'order'  => $order
        ];
        return view('pages/pesan_sukses', $data);
    }
    public function adminOrders()
    {
        $orderModel = new OrderModel();
        $data = [
            'title'  => 'Manajemen Pesanan | Admin',
            'active' => 'admin_orders',
            'orders' => $orderModel->select('orders.*, products.nama_produk')
                                   ->join('products', 'products.id = orders.product_id')
                                   ->orderBy('orders.id', 'DESC')
                                   ->findAll()
        ];
        return view('admin/orders/index', $data);
    }

    public function orderDetail($id)
    {
        $orderModel = new OrderModel();
        $order = $orderModel->select('orders.*, products.nama_produk, products.harga_label, products.foto as foto_produk')
                            ->join('products', 'products.id = orders.product_id')
                            ->find($id);

        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Pesanan tidak ditemukan.');
        }

        $data = [
            'title'  => 'Detail Pesanan #' . $order['id'],
            'active' => 'admin_orders',
            'order'  => $order
        ];

        return view('admin/orders/detail', $data);
    }

    public function deleteOrder($id)
    {
        $orderModel = new OrderModel();
        $orderModel->delete($id);
        return redirect()->to('/admin/orders')->with('success', 'Pesanan berhasil dihapus.');
    }

    // Update Status Pesanan (Admin)
    public function updateStatus($id)
    {
        $orderModel = new OrderModel();
        $status = $this->request->getPost('status');

        $orderModel->update($id, [
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}