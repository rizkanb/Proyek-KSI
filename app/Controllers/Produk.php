<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        helper(['url', 'form']);
        // Inisialisasi model di constructor agar bisa dipakai di semua method
        $this->produkModel = model(ProdukModel::class);
    }

    /**
     * Menampilkan daftar produk (Halaman Index)
     */
    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        $jurusan = $this->request->getGet('jurusan');
        $search  = $this->request->getGet('search');
        $produk = [];

        try {
            // Panggil fungsi loadProduk dari model
            $produk = $this->produkModel->loadProduk($jurusan, $search);
        } catch (\Exception $e) {
            // log_message('error', 'ProdukModel::loadProduk failed: ' . $e->getMessage());
            $produk = $this->produkModel->findAll();
        }

        $data = [
            'title' => 'Manajemen Data Produk',
            'data_produk' => $produk, // Ini adalah variabel yang dipakai di view Anda
            'jurusan' => $jurusan ?? '',
            'search' => $search ?? '',
            'content_title' => 'Daftar Produk Koperasi',
        ];

        return view('admin/Produk/index', $data);
    }

    /**
     * Menampilkan halaman form edit
     */
    public function edit($id = null)
    {
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        $produk = $this->produkModel->find($id);

        if (!$produk) {
            session()->setFlashdata('pesan', 'Produk tidak ditemukan.');
            return redirect()->to(route_to('produk_management'));
        }

        $data = [
            'title' => 'Edit Produk',
            'produk' => $produk, // Kirim data produk yang akan di-edit
            'validation' => service('validation'),
            'content_title' => 'Formulir Edit Produk',
        ];

        return view('admin/Produk/edit', $data);
    }


    // =================================================================
    // == PERBAIKAN UTAMA ADA DI FUNGSI UPDATE DI BAWAH INI ==
    // =================================================================

    /**
     * Memproses data dari form edit
     */
    public function update($id = null)
    {
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        // 1. TAMBAHKAN VALIDASI UNTUK 'jurusan'
        if (!$this->validate([
            'nama_produk' => 'required|min_length[3]',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'jurusan' => 'required', // Pastikan jurusan juga divalidasi
        ])) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // 2. PASTIKAN 'jurusan' DIAMBIL DARI POST
        $data = [
            'id'          => $id, // Penting agar model tahu ini adalah UPDATE
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'jurusan'     => $this->request->getPost('jurusan'), // INI BARIS YANG KRITIS
        ];

        // 3. PANGGIL FUNGSI SAVE DARI MODEL
        try {
            $this->produkModel->save($data);
            session()->setFlashdata('pesan', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            session()->setFlashdata('errors', ['Gagal menyimpan ke database: ' . $e->getMessage()]);
            return redirect()->back()->withInput();
        }

        return redirect()->to(route_to('produk_management'));
    }

    /**
     * Memproses data dari form tambah
     */
    public function create()
    {
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        if (!$this->validate([
            'nama_produk' => 'required|min_length[3]',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'jurusan' => 'required',
        ])) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            // Redirect ke 'index' (tempat form tambah berada)
            return redirect()->to(route_to('produk_management'))->withInput();
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'jurusan'     => $this->request->getPost('jurusan'),
        ];

        $this->produkModel->save($data);
        session()->setFlashdata('pesan', 'Produk berhasil ditambahkan!');
        return redirect()->to(route_to('produk_management'));
    }

    /**
     * Menghapus data produk
     */
    public function delete($id = null)
    {
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak.');
        }

        if ($id === null || !$this->produkModel->find($id)) {
            session()->setFlashdata('pesan', 'ID Produk tidak ditemukan.');
        } else {
            $this->produkModel->delete($id);
            session()->setFlashdata('pesan', 'Produk berhasil dihapus.');
        }

        return redirect()->to(route_to('produk_management'));
    }
}
