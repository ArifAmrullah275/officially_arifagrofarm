<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\NewsModel;
use App\Models\MessageModel;
use App\Models\CareerModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Panggil Model
        $productModel = new ProductModel();
        $newsModel    = new NewsModel();
        $msgModel     = new MessageModel();
        $careerModel  = new CareerModel();

        $data = [
            'title' => 'Admin Dashboard - Arif Agro Farm',
            
            // Hitung Data untuk Statistik
            'total_produk' => $productModel->countAll(),
            'total_berita' => $newsModel->countAll(),
            'pesan_baru'   => $msgModel->where('status', 'unread')->countAllResults(),
            'total_loker'  => $careerModel->countAll(),
            
            // Ambil 5 pesan terbaru untuk ditampilkan di dashboard
            'recent_msg'   => $msgModel->orderBy('created_at', 'DESC')->findAll(5)
        ];

        return view('admin/dashboard', $data);
    }
}