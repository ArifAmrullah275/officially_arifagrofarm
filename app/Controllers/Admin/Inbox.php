<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class Inbox extends BaseController
{
    protected $messageModel;
    protected $email;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Kotak Masuk',
            'messages' => $this->messageModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/inbox/index', $data);
    }

    // LIHAT DETAIL PESAN
    public function detail($id)
    {
        // Update status jadi 'read' jika masih 'unread'
        $pesan = $this->messageModel->find($id);
        if($pesan['status'] == 'unread'){
            $this->messageModel->update($id, ['status' => 'read']);
        }

        return $this->response->setJSON($pesan);
    }

    // HAPUS PESAN
    public function delete($id)
    {
        $this->messageModel->delete($id);
        return redirect()->to('/admin/inbox')->with('success', 'Pesan berhasil dihapus!');
    }

    // BALAS PESAN VIA EMAIL
    public function reply()
    {
        $id = $this->request->getPost('id');
        $to = $this->request->getPost('email');
        $subject = 'Re: ' . $this->request->getPost('subjek');
        $message = $this->request->getPost('balasan');

        // Konfigurasi Email (Sesuaikan di .env atau Config/Email.php)
        $this->email->setTo($to);
        $this->email->setFrom('no-reply@arifagro.com', 'Admin Arif Agro Farm');
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        if ($this->email->send()) {
            // Update status jadi 'replied'
            $this->messageModel->update($id, ['status' => 'replied']);
            return redirect()->to('/admin/inbox')->with('success', 'Balasan berhasil dikirim ke ' . $to);
        } else {
            return redirect()->to('/admin/inbox')->with('error', 'Gagal mengirim email. Cek konfigurasi SMTP.');
            // $this->email->printDebugger(['headers']); // Debugging
        }
    }
}