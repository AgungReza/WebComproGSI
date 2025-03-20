<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $lastLogin = $session->get('last_login'); // Ambil waktu login terakhir

        // Debugging: Cek isi session
        log_message('debug', 'AuthFilter: Session Data: ' . json_encode($session->get()));

        // Jika belum login, redirect ke halaman login
        if (!$session->has('isLoggedIn') || $session->get('isLoggedIn') !== true) {
            log_message('debug', 'AuthFilter: User belum login, redirect ke /admin/login');
            return redirect()->to(site_url('admin/login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah sesi sudah lebih dari 30 menit
        if ($lastLogin !== null && (time() - $lastLogin > 1800)) { 
            $session->destroy(); // Hapus sesi
            log_message('debug', 'AuthFilter: Sesi expired, redirect ke /admin/login');
            return redirect()->to(site_url('admin/login'))->with('error', 'Sesi Anda telah habis. Silakan login kembali.');
        }

        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada perubahan setelah halaman dimuat
    }
}
