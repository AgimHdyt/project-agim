<?php
class Auth extends Controller
{
    public function index()
    {
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        if (Flasher::session()) {
            if ($data['petugas']['level'] === 'super admin') {
                header('Location:' . BASEURL . '/admin');
                exit;
            } else {
                header('Location:' . BASEURL . '/petugas');
            }
        }
        $this->view('auth/index');
    }

    public function login()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->model('Auth_model')->getPetugas($username);
        // var_dump($user);
        if ($user) {
            if ($password === $user['password']) {
                if ($user['level'] == 'super admin') {
                    header('Location:' . BASEURL . '/admin');
                    Flasher::setSession($user['username']);
                    Flasher::setFlesh('Kamu berhasil login!!', 'success');
                    exit;
                } else {
                    Flasher::setSession($user['username']);
                    header('Location:' . BASEURL . '/petugas');
                    Flasher::setFlesh('Kamu berhasil login!!', 'success');
                    exit;
                }
            } else {
                Flasher::setFlesh('Email atau password anda salah!!', 'danger');
                header('Location:' . BASEURL . '/auth');
                exit;
            }
        } else {
            Flasher::setFlesh('Akun tidak terdaftar!!!!', 'danger');
            header('Location:' . BASEURL . '/auth');
            exit;
        }
    }

    public function logout()
    {
        Flasher::logout();
        Flasher::setFlesh('Anda barusaja logout!!', 'success');
        header('Location:' . BASEURL . '/auth');
    }
}
