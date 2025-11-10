<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'setting_key' => 'nama_aplikasi',
                'setting_value' => 'Koperasi Keren'
            ],
            [
                'setting_key' => 'email_kontak',
                'setting_value' => 'admin@koperasi.com'
            ],
            [
                'setting_key' => 'status_sistem',
                'setting_value' => 'Aktif (Online)'
            ],
        ];

        // Hapus data lama (jika ada) dan masukkan data baru
        $this->db->table('settings')->truncate();
        $this->db->table('settings')->insertBatch($data);
    }
}
