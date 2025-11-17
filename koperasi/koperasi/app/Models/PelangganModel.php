<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    // Nama tabel di database
    protected $table = 'pelanggan'; 
    // Nama primary key
    protected $primaryKey = 'id';
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 

    // Field yang diizinkan untuk diisi/dimodifikasi
    protected $allowedFields = [
        'nama', 
        'email', 
        'alamat', 
        'telepon', 
        // Tambahkan field lain yang relevan (misal: 'password' jika ini juga tabel user)
    ];

    // Menggunakan timestamps 
    protected $useTimestamps = true; 
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at'; 

    // Aturan Validasi untuk pelanggan
    protected $validationRules = [
        'nama' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|is_unique[pelanggan.email,id,{id}]',
        'alamat' => 'permit_empty',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Maaf. Email tersebut sudah terdaftar.',
        ],
    ];
    protected $skipValidation = false;
}
