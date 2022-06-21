<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('username')) {
            return redirect()->back()->withInput('erroe', 'Invalid Credential');
        }
        $data = [
            'title' => 'Login',
            'validation' => $this->validation,
        ];
        return view('auth/index', $data);
    }

    public function login()
    {
        if (session()->get('username')) {
            return redirect()->back()->withInput('erroe', 'Invalid Credential');
        }
        $db = \Config\Database::connect();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $db->table('tb_user')->getWhere(['username' => $username])->getRowObject();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'username' => $user->username,
                    'level' => $user->level,
                    'logged_in' => true
                ];
                session()->set($data);
                session()->setFlashdata('success', 'Kamu baru saja login!');
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/')->with('error', 'User belum terdaftar!');
        }
    }

    public function logout()
    {
        $data = [
            'username',
            'level'
        ];
        session()->remove($data);
        return redirect()->to('/')->with('success', 'Kamu baru saja logout!');
    }
}
