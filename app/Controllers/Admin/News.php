<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\AnnouncementModel;

class News extends BaseController
{
    protected $newsModel;
    protected $announcementModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->announcementModel = new AnnouncementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Kelola Berita',
            'news'  => $this->newsModel->orderBy('tanggal', 'DESC')->findAll(),
            'announcements' => $this->announcementModel->orderBy('tanggal', 'DESC')->findAll()
        ];
        return view('admin/news/index', $data);
    }

    // --- BERITA: TAMBAH ---
    public function storeNews()
    {
        // Upload Foto
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/news', $namaFoto);
        } else {
            $namaFoto = 'default_news.jpg';
        }

        $this->newsModel->save([
            'judul'          => $this->request->getPost('judul'),
            'konten_singkat' => $this->request->getPost('konten_singkat'),
            'kategori'       => $this->request->getPost('kategori'),
            'tags'           => $this->request->getPost('tags'),
            'tanggal'        => $this->request->getPost('tanggal'),
            'link_baca'      => $this->request->getPost('link_baca'),
            'foto'           => $namaFoto
        ]);

        return redirect()->to('/admin/news')->with('success', 'Berita berhasil diterbitkan!');
    }

    // --- BERITA: UPDATE ---
    public function updateNews()
    {
        $id = $this->request->getPost('id');
        $beritaLama = $this->newsModel->find($id);

        $data = [
            'judul'          => $this->request->getPost('judul'),
            'konten_singkat' => $this->request->getPost('konten_singkat'),
            'kategori'       => $this->request->getPost('kategori'),
            'tags'           => $this->request->getPost('tags'),
            'tanggal'        => $this->request->getPost('tanggal'),
            'link_baca'      => $this->request->getPost('link_baca'),
        ];

        // Cek Foto Baru
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            if ($beritaLama['foto'] != 'default_news.jpg' && file_exists('img/news/' . $beritaLama['foto'])) {
                unlink('img/news/' . $beritaLama['foto']);
            }
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/news', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $this->newsModel->update($id, $data);
        return redirect()->to('/admin/news')->with('success', 'Berita berhasil diperbarui!');
    }

    // --- BERITA: HAPUS ---
    public function deleteNews($id)
    {
        $berita = $this->newsModel->find($id);
        if ($berita['foto'] != 'default_news.jpg' && file_exists('img/news/' . $berita['foto'])) {
            unlink('img/news/' . $berita['foto']);
        }
        $this->newsModel->delete($id);
        return redirect()->to('/admin/news')->with('success', 'Berita dihapus!');
    }

    // --- PENGUMUMAN: TAMBAH ---
    public function storeAnn() {
    $this->announcementModel->save([
        'judul'      => $this->request->getPost('judul'),
        'tanggal'    => $this->request->getPost('tanggal'),
        'expired_at' => $this->request->getPost('expired_at'),
    ]);
        return redirect()->to('/admin/news')->with('success', 'Pengumuman ditambahkan!');
    }

    // --- PENGUMUMAN: HAPUS ---
    public function deleteAnn($id)
    {
        $this->announcementModel->delete($id);
        return redirect()->to('/admin/news')->with('success', 'Pengumuman dihapus!');
    }
}