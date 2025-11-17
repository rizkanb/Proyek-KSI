<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel; // Pastikan Anda punya model ini

class Anggota extends BaseController
{
    /**
     * Menampilkan halaman daftar anggota.
     * URL: /dashboard/anggota (GET)
     */
    public function index()
    {
        // Pastikan admin sudah login
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses ditolak.');
        }

        // Coba muat model
        try {
            $anggotaModel = new AnggotaModel();
            $data_anggota = $anggotaModel->findAll();
        } catch (\Exception $e) {
            // Jika model/tabel tidak ada, kirim array kosong agar halaman tetap tampil
            log_message('error', 'Error memuat AnggotaModel: ' . $e->getMessage());
            $data_anggota = [];
        }

        $data = [
            'title' => 'Manajemen Anggota',
            'content_title' => 'Daftar Anggota Koperasi',
            'data_anggota' => $data_anggota,
        ];

        return view('Admin/Anggota/index', $data);
    }

    // --- Method lain (new, create, edit, update, delete) ---
    // Pastikan Anda juga memiliki method-method ini jika Anda menggunakannya di routes

    public function new()
    {
        // Tampilkan form tambah anggota baru
        $data = [
            'title' => 'Tambah Anggota Baru',
            'content_title' => 'Formulir Anggota Baru',
            'validation' => service('validation')
        ];
        return view('Admin/Anggota/new', $data); // Pastikan view 'new.php' ada
    }

    public function save()
    {
        // Proses simpan data anggota baru
        $anggotaModel = new AnggotaModel();
        
        // ... (tambahkan logika validasi dan save) ...
        
        session()->setFlashdata('pesan', 'Anggota baru berhasil ditambahkan.');
        return redirect()->to(route_to('anggota_list'));
    }
    
    // ... (method edit, update, delete) ...
}
