<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        $data['title'] = 'Kontak Kami';
        return view('contact_view', $data);
    }
}
