<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceStatsModel;
use App\Models\ServiceListModel;

class Services extends BaseController
{
    protected $statsModel;
    protected $listModel;

    public function __construct()
    {
        $this->statsModel = new ServiceStatsModel();
        $this->listModel = new ServiceListModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Kelola Layanan',
            'stats' => $this->statsModel->first(), 
            'services' => $this->listModel->findAll() 
        ];
        return view('admin/services/index', $data);
    }

    // --- UPDATE STATISTIK ---
    public function updateStats()
    {
        $id = 1; 
        $data = [
            'stat1_value' => $this->request->getPost('stat1_value'),
            'stat1_label' => $this->request->getPost('stat1_label'),
            'stat2_value' => $this->request->getPost('stat2_value'),
            'stat2_label' => $this->request->getPost('stat2_label'),
            'stat3_value' => $this->request->getPost('stat3_value'),
            'stat3_label' => $this->request->getPost('stat3_label'),
            'stat4_value' => $this->request->getPost('stat4_value'),
            'stat4_label' => $this->request->getPost('stat4_label'),
        ];

        $this->statsModel->update($id, $data);
        return redirect()->to('/admin/services')->with('success', 'Statistik Layanan Diperbarui!');
    }

    // --- TAMBAH LAYANAN ---
    public function storeService()
    {
        $this->listModel->save([
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ikon'      => $this->request->getPost('ikon'),
            'link_aksi' => $this->request->getPost('link_aksi'),
        ]);

        return redirect()->to('/admin/services')->with('success', 'Layanan Baru Ditambahkan!');
    }

    // --- UPDATE LAYANAN ---
    public function updateService()
    {
        $id = $this->request->getPost('id');
        $this->listModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ikon'      => $this->request->getPost('ikon'),
            'link_aksi' => $this->request->getPost('link_aksi'),
        ]);

        return redirect()->to('/admin/services')->with('success', 'Data Layanan Diperbarui!');
    }

    // --- HAPUS LAYANAN ---
    public function deleteService($id)
    {
        $this->listModel->delete($id);
        return redirect()->to('/admin/services')->with('success', 'Layanan Dihapus!');
    }
}