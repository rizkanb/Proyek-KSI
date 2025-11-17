<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    /**
     * Menampilkan halaman utama Laporan.
     * URL: /dashboard/laporan
     */
    public function index()
    {
        // Pastikan pengguna sudah login dan memiliki akses Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses ditolak.');
        }
        
        $data = [
            'title' => 'Pilih Laporan',
            'content_title' => 'Pilihan Laporan',
            'laporan_options' => [
                'penjualan' => 'Laporan Penjualan Produk',
                'anggota' => 'Laporan Data Anggota',
                // Tambahkan opsi lain di sini
            ]
        ];

        // Memanggil View: Admin/Laporan/index
        // Pastikan file ini ada di app/Views/Admin/Laporan/index.php
        return view('Admin/Laporan/index', $data); 
    }

    /**
     * Menampilkan Laporan Penjualan
     * URL: /dashboard/laporan/penjualan
     */
    public function penjualan()
    {
        // Pastikan pengguna sudah login dan memiliki akses Admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses ditolak.');
        }

        $data = [
            'title' => 'Laporan Penjualan',
            'content_title' => 'Laporan Penjualan Bulanan',
            // Data laporan dimuat dari Model Transaksi di sini
            'penjualan_data' => [], 
        ];

        // Memanggil View: Admin/Laporan/penjualan
        // Pastikan file ini ada di app/Views/Admin/Laporan/penjualan.php
        return view('Admin/Laporan/penjualan', $data);
    }
}
