<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Benefit extends BaseController
{
    public function index()
    {
        $data['title'] = 'Keuntungan Koperasi';
        return view('benefit_view', $data);
    }
}
