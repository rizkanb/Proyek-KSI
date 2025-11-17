<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    // Nama tabel di database
    protected $table = 'pemesanan';

    // Primary key
    protected $primaryKey = 'id';

    // Jenis data yang dikembalikan (array)
    protected $returnType = 'array';

    // Tidak menggunakan soft delete
    protected $useSoftDeletes = false;

    // Kolom yang boleh diisi
    protected $allowedFields = [
        'user_id',
        'produk_id',
        'jumlah',
        'total_harga',
        'status',
        // Kolom di bawah ini dihapus dari allowedFields karena sering menjadi sumber masalah saat INSERT/UPDATE
        // 'created_at',
        // 'updated_at',
    ];

    // Gunakan timestamps otomatis: SET FALSE UNTUK MENGHINDARI EROR 'created_at' di DB
    protected $useTimestamps = false; 
    
    // Aturan validasi (Biarkan seperti semula)
    protected $validationRules = [
        'user_id'       => 'required|integer',
        'produk_id'     => 'required|integer',
        'jumlah'        => 'required|integer|greater_than_equal_to[1]',
        'total_harga'   => 'required|decimal|greater_than_equal_to[0]',
        'status'        => 'required|in_list[Pending,Proses,Selesai,Batal]',
    ];

    protected $validationMessages = [
        'status' => [
            'in_list' => 'Status hanya boleh Pending, Proses, Selesai, atau Batal.'
        ]
    ];

    protected $skipValidation = false;

    // Fungsi ini bisa Anda tambahkan jika ingin mengambil data pesanan
    // beserta nama pelanggan (dari tabel 'users') dan nama produk (dari tabel 'produk')
    public function getPemesananLengkap()
    {
        return $this->select('pemesanan.*, users.nama_lengkap as nama_pelanggan, produk.nama_produk')
                    ->join('users', 'users.id = pemesanan.user_id', 'left')
                    ->join('produk', 'produk.id = pemesanan.produk_id', 'left')
                    ->findAll();
    }
}

