<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    // METHOD WAJIB: Menampilkan View Login
    public function index()
    {
        return view('login'); // Pastikan Anda memiliki app/Views/login.php
    }

    // METHOD LOGIN: Memproses data login
    public function login()
    {
        $session = session();
        $model = new UserModel(); 

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first(); 

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $ses_data = [
                    'id'            => $user['id'],
                    'username'      => $user['username'],
                    'nama_lengkap'  => $user['nama_lengkap'], 
                    'level'         => $user['level'], 
                    'isLoggedIn'    => TRUE
                ];
                
                $session->set($ses_data);
                
                // --- LOGIKA PENGALIHAN BERDASARKAN LEVEL ---
                if ($user['level'] === 'admin') {
                    return redirect()->to(route_to('dashboard')); 
                } else {
                    return redirect()->to(route_to('user_dashboard'));
                }

            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to(route_to('login'))->withInput();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to(route_to('login'))->withInput();
        }
    }
    
    // METHOD LOGOUT
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(route_to('login'));
    }


    // METHOD REGISTRASI: Menampilkan Form Registrasi
    public function register_form()
    {
        $data['title'] = 'Buat Akun Baru';
        // PERBAIKAN PATH: Memanggil register_view.php dari root Views (app/Views/register_view.php)
        return view('register_view', $data); 
    }

    // METHOD SIMPAN REGISTRASI: Memproses Data Registrasi
    public function save_register()
    {
        // 1. Validasi Input Data
        $rules = [
            'nama_lengkap'  => 'required|min_length[3]|max_length[150]',
            'username'      => 'required|min_length[5]|max_length[100]|is_unique[users.username]', 
            'password'      => 'required|min_length[6]',
            'pass_confirm'  => 'matches[password]', 
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Data Valid, Proses Penyimpanan
        $model = new UserModel();

        $data = [
            'username'      => $this->request->getVar('username'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT), 
            'nama_lengkap'  => $this->request->getVar('nama_lengkap'),
            'level'         => 'anggota', // Default level untuk registrasi baru
            'status'        => 1,
        ];

        $model->insert($data); 

        // 3. Redirect ke Halaman Login dengan pesan sukses
        session()->setFlashdata('success', 'Akun berhasil dibuat. Silakan masuk.');
        return redirect()->to(route_to('login'));
    }
}
