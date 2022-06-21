<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function dataUser()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->db->table('tb_user')->get()->getResultObject(),
            'user' => $this->user,
            'validation' => $this->validation,
        ];

        return view('admin/data-user', $data);
    }

    public function addUser()
    {
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $alamat = $this->request->getVar('alamat');
        $level = $this->request->getVar('level');

        if (!$this->validate([
            'nama' => 'required|trim',
            'username' => 'required|trim|is_unique[tb_user.username]',
            'password' => [
                'rules' => 'required|trim|min_length[8]',
                'errors' => [
                    'matches' => 'Password don\'t match',
                    'min_length' => 'Password too short'
                ],
            ],
            'alamat' => 'required|trim',
            'level' => 'required|trim'
        ])) {
            return redirect()->to('/data-user')->withInput();
        }

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => 'avatar.png',
            'alamat' => $alamat,
            'level' => $level,
            'created_at' => time()
        ];

        $this->db->table('tb_user')->insert($data);
        return redirect()->to('/data-user')->with('success', 'Data Berhasil di tambahkan!');
    }

    public function getUser()
    {
        $id = $this->request->getVar('id');
        echo json_encode($this->db->table('tb_user')->getWhere(['id' => $id])->getRowObject());
    }

    public function editUser()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $new_password = $this->request->getVar('password');
        $alamat = $this->request->getVar('alamat');
        $level = $this->request->getVar('level');

        $user = $this->db->table('tb_user')->getWhere(['id' => $id])->getRowobject();

        if ($username == $user->username) {
            if (!$this->validate([
                'nama' => 'required|trim',
                'alamat' => 'required|trim',
                'level' => 'required|trim'
            ])) {
                return redirect()->to('/data-user')->withInput();
            }
        } else {
            if (!$this->validate([
                'nama' => 'required|trim',
                'username' => 'required|trim|is_unique[tb_user.username]',
                'password' => [
                    'rules' => 'required|trim|min_length[8]',
                    'errors' => [
                        'matches' => 'Now password don\'t match',
                        'min_length' => 'Password too short'
                    ],
                ],
                'alamat' => 'required|trim',
                'level' => 'required|trim'
            ])) {
                return redirect()->to('/data-user')->withInput();
            }
        }

        if (!$new_password) {
            $password = $user->password;
        } else {
            $password = password_hash($new_password, PASSWORD_DEFAULT);
        }

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'alamat' => $alamat,
            'level' => $level,
            'created_at' => time()
        ];

        $this->db->table('tb_user')->where(['id' => $id])->update($data);

        return redirect()->to('/data-user')->with('success', 'Data Berhasil di ubah!');
    }

    public function delUser($id)
    {
        $user = $this->db->table('tb_user')->getWhere(['id' => $id])->getRowObject();

        if ($user->image != 'avatar.png') {
            unlink('assets/dist/img/' . $user->image);
        }

        $this->db->table('tb_user')->where(['id' => $id])->delete();

        session()->setFlashdata('success', 'Data Berhasil di hapus!');
        return redirect()->to('/data-user');
    }


    public function dataDokter()
    {
        $data = [
            'title' => 'Data Dokter',
            'user' => $this->user,
            'validation' => $this->validation,
            'dokters' => $this->db->table('tb_dokter')->get()->getResultObject()
        ];

        return view('admin/data-dokter', $data);
    }

    public function addDokter()
    {
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $alamat = $this->request->getVar('alamat');
        if (!$this->validate([
            'nama' => 'required|trim',
            'jenis' => 'required|trim',
            'alamat' => 'required|trim'
        ])) {
            return redirect()->to('/data-dokter')->withInput();
        }
        $data = [
            'nama' => $nama,
            'jenis' => $jenis,
            'alamat' => $alamat,
            'created_at' => time()
        ];

        $this->db->table('tb_dokter')->insert($data);
        return redirect()->to('/data-dokter')->with('success', 'Data Berhasil di tambahkan!');
    }

    public function getDokter()
    {
        $id = $this->request->getVar('id');
        echo json_encode($this->db->table('tb_dokter')->getWhere(['id' => $id])->getRowObject());
    }

    public function editDokter()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $alamat = $this->request->getVar('alamat');
        if (!$this->validate([
            'nama' => 'required|trim',
            'jenis' => 'required|trim',
            'alamat' => 'required|trim'
        ])) {
            return redirect()->to('/data-dokter')->withInput();
        }
        $data = [
            'nama' => $nama,
            'jenis' => $jenis,
            'alamat' => $alamat,
            'created_at' => time()
        ];

        $this->db->table('tb_dokter')->where(['id' => $id])->update($data);
        return redirect()->to('/data-dokter')->with('success', 'Data Berhasil di ubah!');
    }

    public function delDokter($id)
    {
        $this->db->table('tb_dokter')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Data Berhasil di hapus!');
        return redirect()->to('/data-dokter');
    }


    public function dataObat()
    {
        $data = [
            'title' => 'Data Obat',
            'user' => $this->user,
            'validation' => $this->validation,
            'obats' => $this->db->table('tb_obat')->get()->getResultObject()
        ];

        return view('admin/data-obat', $data);
    }

    public function addObat()
    {
        $nama = $this->request->getVar('nama');
        $satuan = $this->request->getVar('satuan');
        $harga = $this->request->getVar('harga');
        $keterangan = $this->request->getVar('keterangan');
        if (!$this->validate([
            'nama' => 'required|trim',
            'satuan' => 'required|trim',
            'harga' => 'required|trim|numeric',
            'keterangan' => 'required|trim'
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }
        $data = [
            'nama' => $nama,
            'satuan' => $satuan,
            'satuan' => $satuan,
            'harga' => $harga,
            'keterangan' => $keterangan,
            'created_at' => time()
        ];

        $this->db->table('tb_obat')->insert($data);
        return redirect()->to('/data-obat')->with('success', 'Data Berhasil di tambahkan!');
    }

    public function getObat()
    {
        $id = $this->request->getVar('id');
        echo json_encode($this->db->table('tb_obat')->getWhere(['id' => $id])->getRowObject());
    }

    public function editObat()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $satuan = $this->request->getVar('satuan');
        $harga = $this->request->getVar('harga');
        $keterangan = $this->request->getVar('keterangan');
        if (!$this->validate([
            'nama' => 'required|trim',
            'satuan' => 'required|trim',
            'harga' => 'required|trim|numeric',
            'keterangan' => 'required|trim'
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }
        $data = [
            'nama' => $nama,
            'satuan' => $satuan,
            'satuan' => $satuan,
            'harga' => $harga,
            'harga' => $harga,
            'keterangan' => $keterangan,
            'created_at' => time()
        ];

        $this->db->table('tb_obat')->where(['id' => $id])->update($data);

        return redirect()->to('/data-obat')->with('success', 'Data Berhasil di ubah!');
    }

    public function delObat($id)
    {
        $this->db->table('tb_obat')->where(['id' => $id])->delete();

        return redirect()->to('/data-obat')->with('success', 'Data Berhasil di hapus!');
    }
}
