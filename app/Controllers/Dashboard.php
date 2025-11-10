<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /**
     * Menampilkan halaman utama dasbor admin koperasi.
     */
    public function index()
    {
        // Cek apakah user sudah login dan memiliki level admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()
                ->to(route_to('login'))
                ->with('error', 'Akses ditolak! Silakan login sebagai admin.');
        }

        // Data yang akan dikirim ke view
        $data = [
            'title'         => 'Dashboard Admin - KOPERASI',
            'content_title' => 'Selamat Datang di Dashboard Admin!',
            'username'      => session()->get('username'),
            'tanggal'       => date('d F Y'),
        ];

        // Tampilkan tampilan utama dashboard
        return view('admin/index', $data);
    }
}
