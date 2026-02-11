<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ApplicationModel;

class Application extends BaseController
{
    protected $appModel;

    public function __construct()
    {
        $this->appModel = new ApplicationModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Daftar Pelamar',
            'applications' => $this->appModel->select('applications.*, careers.posisi')
                                            ->join('careers', 'careers.id = applications.career_id')
                                            ->orderBy('applications.created_at', 'DESC')
                                            ->findAll()
        ];
        return view('admin/application/index', $data);
    }

    public function updateStatus()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $this->appModel->update($id, ['status' => $status]);

        return redirect()->back()->with('success', 'Status pelamar berhasil diperbarui!');
    }

    public function delete($id)
    {
        $data = $this->appModel->find($id);
        
        if ($data) {
            // Hapus file CV fisik dari folder uploads
            if (file_exists(ROOTPATH . 'public/uploads/cv/' . $data['file_cv'])) {
                unlink(ROOTPATH . 'public/uploads/cv/' . $data['file_cv']);
            }
            $this->appModel->delete($id);
        }

        return redirect()->back()->with('success', 'Data pelamar berhasil dihapus.');
    }
}