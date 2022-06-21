<?php

namespace App\Controllers;

class User extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->user,
            'validation' => $this->validation
        ];
        return view('user/index', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->user,
            'validation' => $this->validation
        ];
        return view('user/profile', $data);
    }

    public function editProfile()
    {
        $user = $this->user;

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');

        $fileImage = $this->request->getFile('image');

        if ($fileImage->getError() == 4) {
            $image = $user->image;
        } else {
            $image = $fileImage->getName();
            // $fileImage->move('assets/dist/img');
            if ($fileImage->move('assets/dist/img')) {
                $old_image = $user->image;
                if ($old_image != 'avatar.png') {
                    unlink('assets/dist/img/' . $old_image);
                }
            }
        }

        $id = $id;
        $update = [
            'nama' => $nama,
            'username' => $username,
            'image' => $image
        ];

        $this->db->table('tb_user')->where(['id' => $id])->update($update);
        return redirect()->to('/profile')->with('success', 'Your profile has been updated!');
    }

    public function editPassword()
    {
        $id = $this->request->getVar('id');
        $now_password = $this->request->getVar('now_password');
        $new_password = $this->request->getVar('new_password');
        $current_password = $this->request->getVar('current_password');
        $user = $this->db->table('tb_user')->getWhere(['id' => $id])->getRowArray();
        if (password_verify($now_password, $user['password']) == false) {
            return redirect()->to('/profile')->with('error', 'Password sekarang salah!');
        } else {
            if (!$this->validate([
                'now_password' => [
                    'rules' => 'required|trim|min_length[8]',
                    'errors' => [
                        'matches' => 'Now password don\'t match',
                        'min_length' => 'Password too short'
                    ],
                ],
                'new_password' => [
                    'rules' => 'required|trim|min_length[8]|matches[current_password]',
                    'errors' => [
                        'matches' => 'Password don\'t match',
                        'min_length' => 'Password too short'
                    ],
                ],
                'current_password' => [
                    'rules' => 'required|trim|min_length[8]|matches[new_password]',
                    'errors' => [
                        'matches' => 'Password don\'t match',
                        'min_length' => 'Password too short'
                    ],
                ],
            ])) {
                return redirect()->to('/profile')->withInput();
            }
        }

        $data = [
            'password' => password_hash($new_password, PASSWORD_DEFAULT)
        ];

        $this->db->table('tb_user')->where(['id' => $id])->update($data);
        return redirect()->to('/profile')->with('success', 'Password berhasil diubah.');
    }
}
