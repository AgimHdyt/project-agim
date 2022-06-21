<?php

namespace App\Controllers;

class Owner extends BaseController
{
    public function dataResep()
    {
        $data = [
            'title' => 'Data Resep',
            'user' => $this->user,
            'validation' => $this->validation,
            'reseps' => $this->db->table('tb_resep')->get()->getResultObject(),
            'berobats' => $this->db->table('tb_berobat')->get()->getResultObject(),
            'obats' => $this->db->table('tb_obat')->get()->getResultObject()
        ];

        return view('owner/data-resep', $data);
    }

    public function addResep()
    {
        $id_berobat = $this->request->getVar('id_berobat');
        $id_obat = $this->request->getVar('id_obat');
        $nama_obat = $this->request->getVar('nama_obat');
        $qty = $this->request->getVar('qty');
        $harga = $this->request->getVar('harga');
        $dokter_fee = $this->request->getVar('dokter_fee');
        if (!$this->validate([
            'id_berobat' => 'required|trim',
            'id_obat' => 'required|trim',
            'nama_obat' => 'required|trim',
            'qty' => 'required|trim|numeric',
            'harga' => 'required|trim|numeric',
            'dokter_fee' => 'required|trim|numeric',
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }
        $data = [
            'id_berobat' => $id_berobat,
            'id_obat' => $id_obat,
            'nama_obat' => $nama_obat,
            'qty' => $qty,
            'harga' => $harga,
            'docter_fee' => $dokter_fee,
            'created_at' => time()
        ];

        $this->db->table('tb_resep')->insert($data);
        return redirect()->to('/data-resep')->with('success', 'Data Berhasil di tambahkan!');
    }

    public function getResep()
    {
        $id = $this->request->getVar('id');
        echo json_encode($this->db->table('tb_resep')->getWhere(['id' => $id])->getRowObject());
    }

    public function editResep()
    {
        $id = $this->request->getVar('id');
        $id_berobat = $this->request->getVar('id_berobat');
        $id_obat = $this->request->getVar('id_obat');
        $nama_obat = $this->request->getVar('nama_obat');
        $qty = $this->request->getVar('qty');
        $harga = $this->request->getVar('harga');
        $dokter_fee = $this->request->getVar('dokter_fee');
        if (!$this->validate([
            'id_berobat' => 'required|trim',
            'id_obat' => 'required|trim',
            'nama_obat' => 'required|trim',
            'qty' => 'required|trim|numeric',
            'harga' => 'required|trim|numeric',
            'dokter_fee' => 'required|trim|numeric',
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }
        $data = [
            'id_berobat' => $id_berobat,
            'id_obat' => $id_obat,
            'nama_obat' => $nama_obat,
            'qty' => $qty,
            'harga' => $harga,
            'docter_fee' => $dokter_fee,
            'created_at' => time()
        ];

        $this->db->table('tb_resep')->where(['id' => $id])->update($data);
        return redirect()->to('/data-resep')->with('success', 'Data Berhasil di ubah!');
    }

    public function delResep($id)
    {
        $this->db->table('tb_resep')->where(['id' => $id])->delete();
        return redirect()->to('/data-resep')->with('success', 'Data Berhasil di hapus');
    }


    public function dataBerobat()
    {
        $data = [
            'title' => 'Data Berobat',
            'user' => $this->user,
            'validation' => $this->validation,
            'berobats' => $this->db->table('tb_berobat')->get()->getResultObject(),
            'dokters' => $this->db->table('tb_dokter')->get()->getResultObject(),
            'pasiens' => $this->db->table('tb_pasien')->get()->getResultObject(),
        ];

        return view('owner/data-berobat', $data);
    }

    public function addBerobat()
    {
        $id_dokter = $this->request->getVar('id_dokter');
        $id_pasien = $this->request->getVar('id_pasien');
        $tgl_berobat = $this->request->getVar('tgl_berobat');
        $keluhan = $this->request->getVar('keluhan');
        $hasil_diagnosa = $this->request->getVar('hasil_diagnosa');
        $jenis_berobat = $this->request->getVar('jenis_berobat');

        if (!$this->validate([
            'id_dokter' => 'required|trim',
            'id_pasien' => 'required|trim',
            'tgl_berobat' => 'required|trim',
            'keluhan' => 'required|trim',
            'hasil_diagnosa' => 'required|trim',
            'jenis_berobat' => 'required|trim',
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }

        $data = [
            'id_dokter' => $id_dokter,
            'id_pasien' => $id_pasien,
            'tgl_berobat' => $tgl_berobat,
            'keluhan' => $keluhan,
            'hasil_diagnosa' => $hasil_diagnosa,
            'jenis_berobat' => $jenis_berobat,
            'created_at' => time()
        ];

        $this->db->table('tb_berobat')->insert($data);
        return redirect()->to('/data-berobat')->with('success', 'Data Berhasil di tambahkan!');
    }

    public function getBerobat()
    {
        $id = $this->request->getVar('id');
        echo json_encode($this->db->table('tb_berobat')->getWhere(['id' => $id])->getRowObject());
    }

    public function editBerobat()
    {
        $id = $this->request->getVar('id');
        $id_dokter = $this->request->getVar('id_dokter');
        $id_pasien = $this->request->getVar('id_pasien');
        $tgl_berobat = $this->request->getVar('tgl_berobat');
        $keluhan = $this->request->getVar('keluhan');
        $hasil_diagnosa = $this->request->getVar('hasil_diagnosa');
        $jenis_berobat = $this->request->getVar('jenis_berobat');

        if (!$this->validate([
            'id_dokter' => 'required|trim',
            'id_pasien' => 'required|trim',
            'tgl_berobat' => 'required|trim',
            'keluhan' => 'required|trim',
            'hasil_diagnosa' => 'required|trim',
            'jenis_berobat' => 'required|trim',
        ])) {
            return redirect()->to('/data-obat')->withInput();
        }

        $data = [
            'id_dokter' => $id_dokter,
            'id_pasien' => $id_pasien,
            'tgl_berobat' => $tgl_berobat,
            'keluhan' => $keluhan,
            'hasil_diagnosa' => $hasil_diagnosa,
            'jenis_berobat' => $jenis_berobat,
            'created_at' => time()
        ];

        $this->db->table('tb_berobat')->where(['id' => $id])->update($data);
        return redirect()->to('/data-berobat')->with('success', 'Data Berhasil di ubah!');
    }

    public function delBerobat($id)
    {
        $this->db->table('tb_berobat')->where(['id' => $id])->delete();
        return redirect()->to('/data-berobat')->with('success', 'Data Berhasil di hapus!');
    }
}
