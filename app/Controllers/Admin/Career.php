<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CareerModel;

class Career extends BaseController
{
    protected $careerModel;

    public function __construct()
    {
        $this->careerModel = new CareerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Kelola Karir',
            'careers' => $this->careerModel->findAll()
        ];
        return view('admin/career/index', $data);
    }

    // --- TAMBAH ---
    public function store()
    {
        $this->careerModel->save([
            'posisi'        => $this->request->getPost('posisi'),
            'tipe'          => $this->request->getPost('tipe'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'kualifikasi'   => $this->request->getPost('kualifikasi'), // Simpan apa adanya (dipisah enter/pipe di input)
            'batas_lamaran' => $this->request->getPost('batas_lamaran'),
        ]);

        return redirect()->to('/admin/career')->with('success', 'Lowongan baru berhasil ditambahkan!');
    }

    // --- UPDATE ---
    public function update()
    {
        $id = $this->request->getPost('id');
        
        $this->careerModel->update($id, [
            'posisi'        => $this->request->getPost('posisi'),
            'tipe'          => $this->request->getPost('tipe'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'kualifikasi'   => $this->request->getPost('kualifikasi'),
            'batas_lamaran' => $this->request->getPost('batas_lamaran'),
        ]);

        return redirect()->to('/admin/career')->with('success', 'Data lowongan diperbarui!');
    }

    // --- HAPUS ---
    public function delete($id)
    {
        $this->careerModel->delete($id);
        return redirect()->to('/admin/career')->with('success', 'Lowongan dihapus!');
    }
}