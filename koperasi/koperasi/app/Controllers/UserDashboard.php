<?php

// PENTING:
// Ganti nama file ini menjadi UserDashboard.php
// Hapus file User.php yang lama agar tidak bingung.

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PemesananModel;
use App\Models\ProdukModel;

// PERBAIKAN: Mengganti nama class dari 'User' menjadi 'UserDashboard'
class UserDashboard extends BaseController
{
    protected $userModel;
    protected $pemesananModel;
    protected $produkModel;

    public function __construct()
    {
        // Inisialisasi semua model yang kita butuhkan
        $this->userModel = new UserModel();
        $this->pemesananModel = new PemesananModel();
        $this->produkModel = new ProdukModel();
    }

    /**
     * Menampilkan halaman dashboard utama user.
     * URL: /user
     * Rute: user_dashboard
     */
    public function index()
    {
        // Ambil data user yang sedang login
        $userId = session()->get('id');
        
        // Ganti 'user' dengan 'pelanggan' agar konsisten dengan view Anda
        // (Diambil dari UserModel, tapi kita namai 'pelanggan' untuk view)
        $pelangganData = $this->userModel->find($userId);

        // Siapkan data untuk view
        $data = [
            'title'     => 'Dashboard Pengguna',
            'pelanggan' => $pelangganData
        ];

        // Memanggil app/Views/user/dashboard.php
        return view('user/dashboard', $data);
    }

    /**
     * Menampilkan halaman 'Riwayat & Status'
     * URL: /user/history
     * Rute: user_history
     */
    // PERBAIKAN: Mengganti nama method 'riwayat' menjadi 'history'
    public function history()
    {
        // Halaman riwayat user
        $userId = session()->get('id'); // Ambil ID user yang login
        $data = [];

        // Ambil data pesanan HANYA untuk user ini
        $data['pesanan'] = $this->pemesananModel
            ->select('pemesanan.*, produk.nama_produk') // Ambil nama produk
            ->join('produk', 'produk.id = pemesanan.produk_id', 'left')
            ->where('pemesanan.user_id', $userId)
            ->findAll();

        // Nanti panggil view 'user/history.php'
        return view('user/history', $data); // Pastikan Anda punya view 'user/history.php'
    }

    /**
     * Menampilkan halaman profil (edit).
     * URL: /user/profile
     * Rute: user_profile
     */
    public function profile()
    {
        $session = session();

        // Pastikan user sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth'));
        }

        $userId = $session->get('id');
        // PERBAIKAN: Gunakan 'user' agar konsisten dengan 'profile'
        // Tapi view dashboard pakai 'pelanggan', ini harus Anda standarkan.
        // Kita kirim keduanya untuk amannya:
        $userData = $this->userModel->find($userId);
        
        $data['user'] = $userData; // Untuk form profil
        $data['pelanggan'] = $userData; // Jika header/sidebar perlu
        
        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna tidak ditemukan.');
        }

        $data['title'] = 'Edit Profil Pengguna';

        // Memuat view user/profile.php
        return view('user/profile', $data); // Pastikan Anda punya view 'user/profile.php'
    }

    // Method 'updateProfile' akan dipanggil oleh rute: user_update_profile
    public function updateProfile()
    {
        // ... (Logika untuk menyimpan update profil) ...
        return redirect()->to(route_to('user_profile'))->with('success', 'Profil berhasil diperbarui!');
    }


    /**
     * Ini adalah fungsi KRUSIAL untuk menyimpan data pembelian
     * URL: /user/process_order
     * Rute: user_process_order
     */
    // PERBAIKAN: Mengganti nama method 'prosesPemesanan' menjadi 'processOrder'
    public function processOrder()
    {
        // 1. Ambil data dari form (Contoh)
        $produkId = $this->request->getPost('produk_id');
        $jumlah = (int)$this->request->getPost('jumlah');
        $userId = session()->get('id'); // Ambil ID user dari session

        // 2. Validasi Sederhana (Contoh)
        if (empty($produkId) || $jumlah <= 0 || empty($userId)) {
            return redirect()->back()->withInput()->with('error', 'Data pembelian tidak lengkap.');
        }

        // 3. Ambil data produk (terutama harga) dari database
        $produk = $this->produkModel->find($produkId);
        if (!$produk || !isset($produk['harga'])) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan atau harga tidak valid.');
        }

        // 4. Hitung total harga
        $totalHarga = (float)$produk['harga'] * $jumlah;

        // 5. Siapkan data untuk disimpan
        $dataUntukDisimpan = [
            'user_id'     => $userId,
            'produk_id'   => $produkId,
            'jumlah'      => $jumlah,
            'total_harga' => $totalHarga,
            'status'      => 'Pending', // Status awal saat order dibuat
        ];

        // 6. Simpan ke database menggunakan Model
        if ($this->pemesananModel->save($dataUntukDisimpan) === false) {
            // Jika validasi Model gagal
            return redirect()->back()->withInput()->with('errors', $this->pemesananModel->errors());
        }

        // 7. Jika BERHASIL, alihkan ke halaman riwayat
        return redirect()->to(route_to('user_history'))->with('success', 'Pemesanan berhasil dibuat!');
    }
    
    // Anda mungkin perlu method 'buy'
    public function buy()
    {
        // Halaman untuk menampilkan form pembelian
        $data['title'] = 'Beli Produk';
        // Ambil daftar produk
        $data['produk'] = $this->produkModel->findAll(); 
        
        return view('user/buy_form', $data); // Pastikan Anda punya view 'user/buy_form.php'
    }
}