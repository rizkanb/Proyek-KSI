<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        helper(['url', 'form']);
    }

    /**
     * Menampilkan daftar pelanggan dan memproses pencarian.
     * MENGGUNAKAN GET /dashboard/pelanggan
     */
    public function index()
    {
        $search = $this->request->getGet('search');
        $builder = $this->pelangganModel;
        
        if (!empty($search)) {
            $builder = $builder->like('nama_pelanggan', $search)
                               ->orLike('email', $search);
        }

        $data = [
            'title' => 'Data Master Pelanggan',
            'pelanggan' => $builder->findAll(), // Ambil semua data pelanggan
            'search' => $search ?? ''
        ];
        
        // Memuat View: app/Views/pelanggan/index.php
        return view('pelanggan/index', $data); 
    }
    
    // NOTE: Tambahkan method create(), delete(), edit(), dll. di sini sesuai kebutuhan CRUD.
}