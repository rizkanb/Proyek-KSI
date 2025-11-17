<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTeleponToUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'after'      => 'email' // Tambahkan setelah kolom 'email'
            ],
        ];
        $this->forge->addColumn('users', $fields); // Ganti 'users' jika nama tabel Anda berbeda
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'telepon'); // Ganti 'users' jika nama tabel Anda berbeda
    }
}