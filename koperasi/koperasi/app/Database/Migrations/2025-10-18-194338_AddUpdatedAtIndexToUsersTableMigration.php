<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtIndexToUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'alamat' // Tambahkan setelah kolom 'alamat'
            ],
        ];
        $this->forge->addColumn('users', $fields); // Ganti 'users' jika nama tabel Anda berbeda
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'updated_at'); // Ganti 'users' jika nama tabel Anda berbeda
    }
}