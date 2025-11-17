<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /**
<<<<<<< HEAD
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
=======
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
>>>>>>> beff5d8235860ba5cd30f8e71cdb15f285d1300d
    }
}
