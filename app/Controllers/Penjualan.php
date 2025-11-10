<?php namespace App\Controllers;

// Pastikan BaseController diimpor atau Anda extend dari \CodeIgniter\Controller jika BaseController tidak ada
use App\Models\PemesananModel;
use CodeIgniter\Controller; // Ubah ke CodeIgniter\Controller jika Anda tidak punya BaseController kustom

// Jika Anda menggunakan BaseController, pastikan itu sudah diimpor, jika tidak, ganti menjadi Controller
class Penjualan extends BaseController 
{
    protected $pemesananModel;

    public function __construct()
    {
        // Inisialisasi Model Pemesanan
        $this->pemesananModel = model(PemesananModel::class);
    }
    
    // Method default untuk menampilkan daftar penjualan/pemesanan di dashboard admin
    public function index()
    {
        // ASUMSI: Perlu login sebagai Admin untuk mengakses ini.
        // Anda bisa menambahkan pengecekan otorisasi di sini (misal: session()->get('level') !== 'admin')

        // Mengambil data pemesanan LENGKAP dengan detail user dan produk dari Model
        $listPemesanan = $this->pemesananModel->getPemesananForAdmin();
        
        $data = [
            'title' => 'Data Transaksi Penjualan',
            'content_title' => 'Daftar Semua Pemesanan',
            'listPemesanan' => $listPemesanan, // Variabel ini dikirim ke View Admin
        ];

        // Pastikan view ini ada (misal: app/Views/admin/penjualan/index.php)
        return view('admin/penjualan/index', $data); 
    }
    
    // Method laporan yang Anda berikan (ditambahkan logika pemanggilan Model)
    public function laporan()
    {
        // Contoh: Mengambil semua data untuk laporan
        $data['laporan'] = $this->pemesananModel->getPemesananForAdmin();
        
        $data['title'] = 'Laporan Penjualan';
        $data['content_title'] = 'Laporan Detail Penjualan';
        
        return view('admin/penjualan/laporan_view', $data);
    }
    
    // Method untuk konfirmasi pemesanan (opsional, sebagai contoh fungsi admin)
    public function konfirmasi($id = null)
    {
        if (!$id || !$this->pemesananModel->find($id)) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }

        $this->pemesananModel->update($id, ['status' => 'Selesai']);

        return redirect()->back()->with('success', 'Pemesanan berhasil dikonfirmasi.');
    }
}
