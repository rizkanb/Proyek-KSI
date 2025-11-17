<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Authfilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek jika user belum login
        if (!session()->get('isLoggedIn')) {
            // Redirect ke halaman login
            return redirect()->to(route_to('login'))->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
        
        // Opsional: Cek role/level pengguna
        // Jika route /user, pastikan levelnya adalah 'anggota' atau 'pelanggan'
        // Jika route /dashboard, pastikan levelnya adalah 'admin'
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}