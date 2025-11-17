<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Nama tabel yang Anda konfirmasi
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields  = true;

    protected $allowedFields = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'telepon',
        'alamat',
        'level'
    ];

    // Menggunakan Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

