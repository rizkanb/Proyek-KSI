<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlamatToUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'alamat' => [
                'type' => 'TEXT', // Menggunakan TEXT untuk alamat
                'null' => true,
                'after' => 'telepon' 
            ],
        ];
        $this->forge->addColumn('users', $fields); // Ganti 'users' jika nama tabel Anda berbeda
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'alamat'); // Ganti 'users' jika nama tabel Anda berbeda
    }
}