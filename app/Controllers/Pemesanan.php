<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\UserModel;
use App\Models\ProdukModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pemesanan extends BaseController
{
    protected $pemesananModel;
    protected $userModel;
    protected $produkModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
        $this->userModel = new UserModel();
        $this->produkModel = new ProdukModel();
    }

    /**
     * 🏠 Dashboard Admin - Tabel Semua Pemesanan
     */
    public function index()
    {
        $this->cekAksesAdmin();

        $dataPemesanan = $this->pemesananModel
            ->select('pemesanan.*, users.username AS nama_pelanggan, produk.nama_produk')
            ->join('users', 'users.id = pemesanan.user_id', 'left')
            ->join('produk', 'produk.id = pemesanan.produk_id', 'left')
            ->orderBy('pemesanan.id', 'DESC')
            ->findAll();

        return view('admin/pemesanan/index', [
            'title' => 'Manajemen Pemesanan',
            'content_title' => 'Daftar Semua Pemesanan',
            'pemesanan' => $dataPemesanan
        ]);
    }

    /**
     * ➕ Form Tambah Pemesanan Manual
     */
    public function tambah()
    {
        $this->cekAksesAdmin();

        return view('admin/pemesanan/tambah', [
            'title' => 'Tambah Pemesanan',
            'content_title' => 'Form Tambah Pemesanan Manual',
            'users' => $this->userModel->findAll(),
            'produk' => $this->produkModel->findAll(),
            'validation' => \Config\Services::validation()
        ]);
    }

    /**
     * 💾 Simpan Pemesanan Baru
     */
    public function simpan()
    {
        $this->cekAksesAdmin();

        try {
            $produkId = $this->request->getPost('produk_id');
            $jumlah = (int)$this->request->getPost('jumlah');
            $userId = $this->request->getPost('user_id');
            $status = $this->request->getPost('status');

            if (!$produkId || !$jumlah || $jumlah <= 0) {
                return redirect()->back()->withInput()->with('error', 'Produk dan jumlah wajib diisi.');
            }

            $produk = $this->produkModel->find($produkId);
            if (!$produk) {
                return redirect()->back()->withInput()->with('error', 'Produk tidak ditemukan.');
            }

            $data = [
                'user_id' => $userId,
                'produk_id' => $produkId,
                'jumlah' => $jumlah,
                'total_harga' => $produk['harga'] * $jumlah,
                'status' => $status ?? 'Pending',
            ];

            $this->pemesananModel->save($data);

            return redirect()->to(base_url('dashboard/pemesanan'))
                ->with('success', 'Pemesanan berhasil ditambahkan!');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * 🔍 Detail Pemesanan
     */
    public function detail($id = null)
    {
        $this->cekAksesAdmin();

        $dataPesanan = $this->pemesananModel
            ->select('pemesanan.*, users.username AS nama_pelanggan, users.telepon, users.alamat, produk.nama_produk, produk.harga')
            ->join('users', 'users.id = pemesanan.user_id', 'left')
            ->join('produk', 'produk.id = pemesanan.produk_id', 'left')
            ->where('pemesanan.id', $id)
            ->first();

        if (!$dataPesanan) {
            throw PageNotFoundException::forPageNotFound('Data pemesanan tidak ditemukan.');
        }

        return view('admin/pemesanan/detail', [
            'title' => 'Detail Pemesanan #' . $dataPesanan['id'],
            'content_title' => 'Detail Pemesanan',
            'pesanan' => $dataPesanan
        ]);
    }

    /**
     * 🔄 Update Status Pemesanan
     */
    public function updateStatus($id = null)
    {
        $this->cekAksesAdmin();

        $status = $this->request->getPost('status');

        if (!in_array($status, ['Pending', 'Proses', 'Selesai', 'Batal'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $this->pemesananModel->update($id, ['status' => $status]);

        return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    /**
     * ❌ Hapus Pemesanan
     */
    public function hapus($id = null)
    {
        $this->cekAksesAdmin();

        if ($this->pemesananModel->delete($id)) {
            return redirect()->to(base_url('dashboard/pemesanan'))
                ->with('success', 'Pemesanan berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data pemesanan.');
    }

    /**
     * 🧩 Fungsi Cek Hak Akses Admin
     */
    private function cekAksesAdmin()
    {
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses admin ditolak.');
        }
    }
}
