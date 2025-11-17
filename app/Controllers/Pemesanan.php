<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// 1. Panggil SEMUA Model yang dibutuhkan
use App\Models\PemesananModel;
use App\Models\UserModel;
use App\Models\ProdukModel; // Pastikan model ini ada

class Pemesanan extends BaseController
{
    // Definisikan properti untuk model
    protected $pemesananModel;
    protected $userModel;
    protected $produkModel;

    public function __construct()
    {
        // 2. Inisialisasi semua model di constructor
        $this->pemesananModel = new PemesananModel();
        $this->userModel = new UserModel();
        $this->produkModel = new ProdukModel();
    }

    /**
     * Menampilkan daftar semua pemesanan (Halaman Utama Admin Pemesanan)
     */
    public function index()
    {
        // skema 1: perubahan anggota 1
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        // 3. Ambil nama tabel secara dinamis dari Model
        $userTable = $this->userModel->table;
        $produkTable = $this->produkModel->table;

        // Query JOIN untuk mengambil data lengkap
        $dataPemesanan = $this->pemesananModel
            ->select("pemesanan.*, {$userTable}.username as nama_pelanggan, {$produkTable}.nama_produk")
            ->join($userTable, "{$userTable}.id = pemesanan.user_id", 'left')
            ->join($produkTable, "{$produkTable}.id = pemesanan.produk_id", 'left')
            ->orderBy('pemesanan.id', 'DESC') // Tampilkan yang terbaru di atas
            ->findAll();

        $data = [
            'title' => 'Manajemen Pemesanan',
            'content_title' => 'Daftar Semua Pemesanan',
            // 4. Kirim data pesanan yang sudah di-join ke view
            'pemesanan' => $dataPemesanan
        ];

        return view('admin/pemesanan/index', $data);
    }

    /**
     * Menampilkan form untuk menambah pemesanan manual
     */
    public function tambah()
    {
        // Pengecekan Autentikasi Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        $data = [
            'title' => 'Tambah Pemesanan Manual',
            'content_title' => 'Formulir Pemesanan Manual',
            // Kirim data user dan produk untuk dropdown
            'users' => $this->userModel->findAll(),
            'produk' => $this->produkModel->findAll(),
            'validation' => \Config\Services::validation() // Kirim service validasi
        ];

        return view('admin/pemesanan/tambah', $data);
    }

    /**
     * Menyimpan data pemesanan manual dari form
     */
    public function simpan()
    {
        // Pengecekan Autentikasi Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        // Ambil data dari form
        $produkId = $this->request->getPost('produk_id');
        $jumlah = (int)$this->request->getPost('jumlah');

        // Validasi data (Contoh sederhana, validasi Model lebih baik)
        if (empty($produkId) || $jumlah <= 0) {
            return redirect()->back()->withInput()->with('error', 'Produk dan Jumlah wajib diisi.');
        }

        // Ambil harga produk
        $produk = $this->produkModel->find($produkId);
        if (!$produk || !isset($produk['harga'])) {
            return redirect()->back()->withInput()->with('error', 'Produk tidak valid atau harga tidak ditemukan.');
        }

        // Hitung total harga
        $totalHarga = (float)$produk['harga'] * $jumlah;

        // Siapkan data untuk disimpan
        $dataUntukDisimpan = [
            'user_id' => $this->request->getPost('user_id'),
            'produk_id' => $produkId,
            'jumlah' => $jumlah,
            'total_harga' => $totalHarga,
            'status' => $this->request->getPost('status'),
        ];

        // Simpan menggunakan Model (Model akan melakukan validasi)
        if ($this->pemesananModel->save($dataUntukDisimpan) === false) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $this->pemesananModel->errors());
        }

        // Jika berhasil
        return redirect()->to(base_url('dashboard/pemesanan'))->with('success', 'Pemesanan manual berhasil ditambahkan.');
    }


    /**
     * [PERBAIKAN] Menampilkan halaman detail pemesanan
     */
    public function detail($id = null)
    {
        // Pengecekan Autentikasi Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        if ($id === null) {
            return redirect()->to(base_url('dashboard/pemesanan'))->with('error', 'ID Pemesanan tidak valid.');
        }

        // Ambil nama tabel secara dinamis
        $userTable = $this->userModel->table;
        $produkTable = $this->produkModel->table;

        // [FIX] Query JOIN untuk mengambil data lengkap untuk detail
        $dataPesanan = $this->pemesananModel
            ->select("pemesanan.*, 
                      {$userTable}.username as nama_pelanggan, 
                      {$userTable}.telepon, 
                      {$userTable}.alamat,
                      {$produkTable}.nama_produk,
                      {$produkTable}.harga") // Ambil juga harga satuan
            ->join($userTable, "{$userTable}.id = pemesanan.user_id", 'left')
            ->join($produkTable, "{$produkTable}.id = pemesanan.produk_id", 'left')
            ->where('pemesanan.id', $id)
            ->first(); // Gunakan first() karena hanya cari 1 data

        if (empty($dataPesanan)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data pemesanan tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Pemesanan #' . $dataPesanan['id'],
            'content_title' => 'Detail Pemesanan #' . $dataPesanan['id'],
            'pesanan' => $dataPesanan // Kirim data pesanan yang sudah di-join
        ];

        return view('admin/pemesanan/detail', $data);
    }

    /**
     * [BARU] Mengupdate status pemesanan (dari halaman detail)
     */
    public function updateStatus($id = null)
    {
        // Pengecekan Autentikasi Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        if ($id === null) {
            return redirect()->to(base_url('dashboard/pemesanan'))->with('error', 'ID Pemesanan tidak valid.');
        }

        $status = $this->request->getPost('status');

        // Validasi status
        if (!in_array($status, ['Pending', 'Proses', 'Selesai', 'Batal'])) {
             return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $data = [
            'status' => $status
        ];

        if ($this->pemesananModel->update($id, $data)) {
            return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui.');
        } else {
             return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }

    /**
     * [BARU] Menghapus data pemesanan
     */
    public function hapus($id = null)
    {
        // Pengecekan Autentikasi Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        if ($id === null) {
            return redirect()->to(base_url('dashboard/pemesanan'))->with('error', 'ID Pemesanan tidak valid.');
        }

        if ($this->pemesananModel->delete($id)) {
            return redirect()->to(base_url('dashboard/pemesanan'))->with('success', 'Pemesanan berhasil dihapus.');
        } else {
            return redirect()->to(base_url('dashboard/pemesanan'))->with('error', 'Gagal menghapus pemesanan.');
        }
    }
}