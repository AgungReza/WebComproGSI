<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin/login'); // Pastikan file ini ada di "app/Views/admin/login.php"
    }

    public function processLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        log_message('debug', 'AuthController: Email input: ' . $email);

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            log_message('error', 'AuthController: Email tidak ditemukan - ' . $email);
            return redirect()->to('/admin/login')->with('error', 'Email tidak ditemukan.');
        }

        if (!password_verify($password, $user['password'])) {
            log_message('error', 'AuthController: Password salah untuk email - ' . $email);
            return redirect()->to('/admin/login')->with('error', 'Email atau password salah.');
        }

        // Simpan sesi login
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'user_name'  => $user['name'],
            'last_login' => time(),
        ]);

        log_message('debug', 'AuthController: User berhasil login, session disimpan.');

        return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil!');
    }

    public function register()
    {
        return view('admin/register'); // Pastikan file ini ada di "app/Views/admin/register.php"
    }

    public function processRegister()
    {
        $userModel = new UserModel();
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (empty($name) || empty($email) || empty($password)) {
            return redirect()->to('/admin/register')->with('error', 'Semua field harus diisi.');
        }

        if ($userModel->where('email', $email)->first()) {
            return redirect()->to('/admin/register')->with('error', 'Email sudah terdaftar.');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan user ke database
        $userModel->insert([
            'name'       => $name,
            'email'      => $email,
            'password'   => $hashedPassword,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        log_message('debug', 'AuthController: User berhasil register, tetapi belum login.');

        return redirect()->to('/admin/login')->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
    }


    public function logout()
    {
        session()->destroy();
        log_message('debug', 'AuthController: User logout, session dihapus.');
        return redirect()->to('/admin/login')->with('message', 'Anda telah logout.');
    }
}
