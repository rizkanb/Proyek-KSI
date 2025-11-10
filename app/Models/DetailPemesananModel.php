<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPemesananModel extends Model
{
    // Nama tabel di database
    protected $table = 'detail_pemesanan'; 
    // Nama primary key
    protected $primaryKey = 'id';
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 

    // Field yang diizinkan untuk diisi/dimodifikasi
    protected $allowedFields = [
        'pemesanan_id', 
        'produk_id', 
        'qty', 
        'harga_satuan', 
        'subtotal',
    ];

    // Tidak menggunakan timestamps karena ini adalah tabel detail
    protected $useTimestamps = false; 

    // Aturan Validasi untuk detail pesanan
    protected $validationRules = [
        'pemesanan_id' => 'required|integer',
        'produk_id' => 'required|integer',
        'qty' => 'required|integer|greater_than[0]',
        'harga_satuan' => 'required|numeric|greater_than_equal_to[0]',
        'subtotal' => 'required|numeric|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
