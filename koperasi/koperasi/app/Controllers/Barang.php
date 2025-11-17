<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Barang extends BaseController
{
    public function index()
    {
        // Di sini Anda akan menambahkan logika untuk memuat data barang dari model
        // Contoh:
        // $model = new \App\Models\BarangModel();
        // $data['barang'] = $model->findAll();

        return view('barang/data_view' /*, $data*/);
    }
}
