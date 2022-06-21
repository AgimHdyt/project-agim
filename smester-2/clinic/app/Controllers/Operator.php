<?php

namespace App\Controllers;

class Operator extends BaseController
{

    public function dataPasien()
    {
        $data = [
            'title' => 'Data Pasien',
            'user' => $this->user,
            'validation' => $this->validation,
            'pasiens' => $this->db->table('tb_pasien')->get()->getResultObject()
        ];

        return view('operator/data-pasien', $data);
    }

    public function addPasien()
    {
        $nama = $this->request->getVar('nama');
        $tgl_lahir = $this->request->getVar('tgl_lahir');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $phone = $this->request->getVar('phone');
        $umur = $this->request->getVar('umur');
        $alamat = $this->request->getVar('alamat');
        if (!$this->validate([
            'nama' => 'required|trim',
            'tgl_lahir' => 'required|trim',
            'jenis_kelamin' => 'required|trim',
            'phone' => 'required|trim|numeric',
            'umur' => 'required|trim|numeric',
            'alamat' => 'required|trim',
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }
        $data = [
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'phone' => $phone,
            'umur' => $umur,
            'alamat' => $alamat,
            'created_at' => time()
        ];

        $this->db->table('tb_pasien')->insert($data);
        return redirect()->to('/data-pasien')->with('success', 'Data Berhasil di tambahkan!');
    }

    public function getPasien()
    {
        $id = $this->request->getVar('id');
        echo json_encode($this->db->table('tb_pasien')->getWhere(['id' => $id])->getRowObject());
    }

    public function editPasien()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $tgl_lahir = $this->request->getVar('tgl_lahir');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $phone = $this->request->getVar('phone');
        $umur = $this->request->getVar('umur');
        $alamat = $this->request->getVar('alamat');
        if (!$this->validate([
            'nama' => 'required|trim',
            'tgl_lahir' => 'required|trim',
            'jenis_kelamin' => 'required|trim',
            'phone' => 'required|trim|numeric',
            'umur' => 'required|trim|numeric',
            'alamat' => 'required|trim',
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }
        $data = [
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'phone' => $phone,
            'umur' => $umur,
            'alamat' => $alamat,
            'created_at' => time()
        ];

        $this->db->table('tb_pasien')->where(['id' => $id])->update($data);
        return redirect()->to('/data-pasien')->with('success', 'Data Berhasil di ubah!');
    }

    public function delPasien($id)
    {
        $this->db->table('tb_pasien')->where(['id' => $id])->delete();
        return redirect()->to('/data-pasien')->with('success', 'Data Berhasil di hapus!');
    }
}
