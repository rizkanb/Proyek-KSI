<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data['title'] = 'Tentang Kami';
        return view('about_view', $data);
    }
}
