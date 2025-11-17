<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
<<<<<<< HEAD
    /**
     * Menampilkan halaman "Tentang Kami"
     */
    public function index()
    {
        // Data yang dikirim ke view
        $data = [
            'title'         => 'Tentang Koperasi Kami',
            'content_title' => 'Profil & Informasi Koperasi',
            'deskripsi'     => 'Koperasi ini didirikan untuk meningkatkan kesejahteraan anggota dengan prinsip kebersamaan, tanggung jawab, dan kejujuran.',
            'visi'          => 'Menjadi koperasi modern yang berdaya saing dan bermanfaat bagi masyarakat.',
            'misi'          => [
                'Meningkatkan layanan keuangan dan usaha anggota.',
                'Mendorong pertumbuhan ekonomi anggota koperasi.',
                'Mengembangkan teknologi untuk efisiensi layanan koperasi.'
            ],
        ];

        // Tampilkan view dengan data
=======
    public function index()
    {
        $data['title'] = 'Tentang Kami';
>>>>>>> beff5d8235860ba5cd30f8e71cdb15f285d1300d
        return view('about_view', $data);
    }
}
