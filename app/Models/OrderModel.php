<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    
    // Field yang boleh diisi
    protected $allowedFields    = ['product_id', 'nama_pemesan', 'no_hp', 'alamat', 'jumlah', 'catatan', 'status'];
}