<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SettingModel; // <-- PENTING: Import Model

class Setting extends BaseController
{
    /**
     * Menampilkan halaman pengaturan sistem.
     * URL: /dashboard/setting (GET)
     */
    public function index()
    {
        // Pastikan pengguna sudah login dan memiliki akses (biasanya Admin)
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses ditolak.');
        }

        // ========================================================
        // == PERBAIKAN: Muat data dari Model ==
        // ========================================================
        $settingModel = new SettingModel();

        $data = [
            'title' => 'Pengaturan Sistem',
            'settings' => [
                'app_name'      => $settingModel->getSetting('app_name'),
                'contact_email' => $settingModel->getSetting('contact_email'),
                'status'        => $settingModel->getSetting('status'),
            ]
        ];
        
        // Menambahkan notifikasi (jika ada)
        $data['success'] = session()->getFlashdata('success');
        $data['errors'] = session()->getFlashdata('errors');

        // Memastikan view yang dipanggil sesuai dengan struktur folder: Admin/Setting/index
        return view('Admin/Setting/index', $data); 
    }
    
    /**
     * Memproses data POST dari form pengaturan.
     * URL: /dashboard/setting/save (POST)
     */
    public function save()
    {
        // Pastikan hanya POST request yang diterima
        if (!$this->request->is('post')) {
            return redirect()->to(route_to('setting'));
        }

        // Pastikan pengguna sudah login dan memiliki akses (biasanya Admin)
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses ditolak.');
        }

        // --- Logika Validasi dan Penyimpanan ke Database ---
        
        // 1. Ambil data POST (Sudah benar)
        $appName = $this->request->getPost('app_name');
        $contactEmail = $this->request->getPost('contact_email');
        $status = $this->request->getPost('status');
        
        // 2. Lakukan Validasi (Sudah benar)
        $rules = [
            'app_name' => 'required|max_length[100]',
            'contact_email' => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // ========================================================
        // == PERBAIKAN: Simpan ke database menggunakan Model ==
        // ========================================================
        $settingModel = new SettingModel();
        
        $settingModel->saveSetting('app_name', $appName);
        $settingModel->saveSetting('contact_email', $contactEmail);
        $settingModel->saveSetting('status', $status);


        // 4. Redirect dengan pesan sukses (Sudah benar)
        session()->setFlashdata('success', 'Pengaturan berhasil diperbarui.');
        return redirect()->to(route_to('setting'));
    }
}

