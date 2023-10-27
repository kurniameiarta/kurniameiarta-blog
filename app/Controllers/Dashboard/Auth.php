<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Users;

class Auth extends BaseController
{
    protected $users;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
            'active' => 'login',
            'routeName' => $this->request->getPath(),
        ];

        return view('auth/login', $data);
    }

    public function login()
    {
        $validate = $this->validateForm();
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $captcha = $this->request->getVar('g-recaptcha-response');

        // Verify captcha
        $captcha_secret_key = getenv('CAPTCHA_SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$captcha_secret_key}&response={$captcha}");
        $response = json_decode($response, true);

        if (!$response['success'] || $response['score'] < 0.5) {
            return redirect()->back()->with('error', 'Captcha tidak valid');
        }

        $userModel = $this->users;
        $user = $userModel->getUserByUsername($username);

        if (!$user) {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set('user', $user);
        return redirect()->to('/admin');
    }

    private function validateForm()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ];


        return $this->validate($rules);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
