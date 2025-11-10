<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /**
     * Menampilkan halaman utama dasbor admin.
     */
    public function index()
    {
        // Pengecekan autentikasi dan level admin
        if (!session()->get('isLoggedIn') || session()->get('level') !== 'admin') {
            return redirect()->to(route_to('login'))->with('error', 'Akses Admin Ditolak. Silakan Login.');
        }

        $data = [
            'title' => 'Dashboard Utama Admin - KOPERASI',
            'content_title' => 'Halo, Selamat Datang di Dashboard Admin!',
            // Data untuk di passing ke view
        ];

        // *** PERBAIKAN INTI: Memanggil view admin/index.php ***
        return view('admin/index', $data); 
    }
}
