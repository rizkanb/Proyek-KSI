<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel; // Panggil Model

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = new UserModel();
        $data = [
            'username' => 'admin',
            'password' => '123456', // Password akan otomatis di-hash oleh UserModel
            'role' => 'admin',
        ];
        $model->insert($data);
    }
}