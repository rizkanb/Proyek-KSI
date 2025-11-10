<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Memuat tampilan Landing Page yang baru
        return view('home_view');
    }
}