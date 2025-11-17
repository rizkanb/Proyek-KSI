<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    /**
     * Nama tabel di database yang digunakan oleh model ini.
     */
    protected $table = 'anggota'; // Ganti jika nama tabel Anda berbeda

    /**
     * Primary key dari tabel.
     */
    protected $primaryKey = 'id';

    /**
     * Kolom-kolom yang diizinkan untuk diisi (untuk create/update).
     */
    protected $allowedFields = [
        'nama_anggota',
        'email',
        'telepon',
        'alamat',
        'tanggal_bergabung',
        // 'user_id' // (Opsional) jika terhubung ke tabel users
    ];

    /**
     * Menggunakan timestamp (created_at, updated_at) secara otomatis.
     */
    protected $useTimestamps = true; // Set 'false' jika tabel Anda tidak punya kolom created_at/updated_at
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // (Opsional) Aturan validasi
    protected $validationRules    = [];
    protected $validationMessages = [];
}
