<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Kelola Produk',
            'products' => $this->productModel->findAll()
        ];
        return view('admin/products/index', $data);
    }

    // --- TAMBAH PRODUK ---
    public function store()
    {
        // Validasi Foto
        if (!$this->validate([
            'foto' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ])) {
            // Jika tidak ada foto diupload atau error, gunakan default (opsional handle error lebih baik)
            $namaFoto = 'default_product.jpg'; 
        }

        // Proses Upload Foto
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/products', $namaFoto); // Simpan di public/img/products
        } else {
            $namaFoto = 'default_product.jpg';
        }

        $this->productModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'kategori'    => $this->request->getPost('kategori'),
            'harga_label' => $this->request->getPost('harga_label'),
            'link_aksi'   => $this->request->getPost('link_aksi'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/admin/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    // --- UPDATE PRODUK ---
    public function update()
    {
        $id = $this->request->getPost('id');
        $produkLama = $this->productModel->find($id);
        
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'kategori'    => $this->request->getPost('kategori'),
            'harga_label' => $this->request->getPost('harga_label'),
            'link_aksi'   => $this->request->getPost('link_aksi'),
        ];

        // Cek jika ada foto baru
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            if ($produkLama['foto'] != 'default_product.jpg' && file_exists('img/products/' . $produkLama['foto'])) {
                unlink('img/products/' . $produkLama['foto']);
            }
            
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/products', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $this->productModel->update($id, $data);
        return redirect()->to('/admin/products')->with('success', 'Produk berhasil diperbarui!');
    }

    // --- HAPUS PRODUK ---
    public function delete($id)
    {
        $produk = $this->productModel->find($id);
        
        // Hapus file gambar
        if ($produk['foto'] != 'default_product.jpg' && file_exists('img/products/' . $produk['foto'])) {
            unlink('img/products/' . $produk['foto']);
        }

        $this->productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Produk dihapus!');
    }
}