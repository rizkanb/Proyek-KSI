<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk'; // Pastikan nama tabel sudah benar
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    // PENTING: Pastikan 'jurusan' ada di sini
    protected $allowedFields    = [
        'nama_produk', 
        'deskripsi', 
        'harga', 
        'stok', 
        'jurusan', // Izinkan 'jurusan' untuk di-create dan di-update
        'created_at', 
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true; // Otomatis mengisi created_at dan updated_at
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Mengambil produk berdasarkan filter jurusan dan pencarian.
     * Digunakan di Admin Dashboard (ProdukController).
     */
    public function loadProduk($jurusan = null, $search = null)
    {
        $builder = $this->table('produk');

        // 1. Filter berdasarkan Jurusan
        if ($jurusan) {
            $builder->where('jurusan', $jurusan);
        }

        // 2. Filter berdasarkan Pencarian (search)
        if ($search) {
            $builder->like('nama_produk', $search);
        }

        // Ambil hasil
        return $builder->get()->getResultArray();
    }

    /**
     * FUNGSI DIPERBAIKI UNTUK MENGATASI ERROR
     * Mengambil daftar unik jurusan yang produknya masih ada stok.
     * Digunakan di User Dashboard (UserDashboardController).
     */
    public function getAvailableJurusan()
    {
        $query = $this->select('jurusan')
                      ->distinct()
                      ->where('stok >', 0) // Hanya ambil jurusan yang produknya ada stok
                      ->findAll();

        // Biarkan hasil sebagai array of arrays: [ ['jurusan' => 'A'], ['jurusan' => 'B'] ]
        // agar sesuai dengan View (buy_product.php) yang mengharapkan $jurusan['jurusan']
        return $query;
    }
}

