<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class Galeri extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    // 1. Tampilan Utama Admin Galeri
    public function index()
    {
        $data = [
            'title'  => 'Manajemen Galeri | Admin',
            'active' => 'admin_galeri',
            'galeri' => $this->galeriModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('admin/galeri/index', $data);
    }

    // 2. Form Tambah Galeri
    public function tambah()
    {
        $data = [
            'title'  => 'Tambah Foto Galeri | Admin',
            'active' => 'admin_galeri',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/galeri/tambah', $data);
    }

    // 3. Proses Simpan ke Database & Upload File
    public function simpan()
    {
        // Validasi Input
        if (!$this->validate([
            'judul' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Judul foto harus diisi.']
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kategori harus dipilih.']
            ],
            'gambar' => [
                'rules'  => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu.',
                    'max_size' => 'Ukuran gambar terlalu besar (Maks 2MB).',
                    'is_image' => 'Yang Anda pilih bukan gambar.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, atau PNG.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        // Ambil File Gambar
        $fileGambar = $this->request->getFile('gambar');
        
        // Generate Nama File Baru (Random)
        $namaGambar = $fileGambar->getRandomName();
        
        // Pindahkan ke folder public/img/galeri
        $fileGambar->move('img/galeri', $namaGambar);

        // Simpan Data ke Database
        $this->galeriModel->save([
            'judul'    => $this->request->getPost('judul'),
            'kategori' => $this->request->getPost('kategori'),
            'gambar'   => $namaGambar
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Foto berhasil ditambahkan ke galeri.');
    }

    // 4. Proses Hapus Data & File Fisik
    public function hapus($id)
    {
        // Cari data berdasarkan ID
        $galeri = $this->galeriModel->find($id);

        if ($galeri) {
            // Hapus file fisik di folder public/img/galeri jika ada
            $path = 'img/galeri/' . $galeri['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }

            // Hapus data dari database
            $this->galeriModel->delete($id);

            return redirect()->to('/admin/galeri')->with('success', 'Data galeri berhasil dihapus.');
        }

        return redirect()->to('/admin/galeri')->with('error', 'Data tidak ditemukan.');
    }
}