<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Debugging: Cek apakah session isLoggedIn sudah ada
        log_message('debug', 'NoAuthFilter: Session Data: ' . json_encode($session->get()));

        // Jika sudah login, pastikan redirect hanya terjadi saat user berada di halaman login
        if ($session->has('isLoggedIn') && $session->get('isLoggedIn') === true) {
            if ($request->getUri()->getPath() === 'admin/login' || $request->getUri()->getPath() === 'login') {
                log_message('debug', 'NoAuthFilter: User sudah login, redirect ke /admin/dashboard');
                return redirect()->to(site_url('admin/dashboard'))->with('error', 'Anda sudah login.');
            }
        }
        
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada perubahan setelah halaman dimuat
    }
}
