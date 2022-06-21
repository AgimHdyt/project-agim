<?php
class Petugas extends Controller
{
    public function __construct()
    {

        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        if (!Flasher::session()) {
            header('Location:' . BASEURL . '/auth');
            exit;
        }
    }
    public function index()
    {
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        if ($data['petugas']['level'] == 'super admin') {
            header('Location:' . BASEURL . '/admin');
            exit;
        }
        $data['title'] = 'Dashboard';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function siswa()
    {
        $data['title'] = 'Data Siswa';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        $data['siswa'] = $this->model('Petugas_model')->getAllSiswa();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('petugas/siswa', $data);
        $this->view('templates/footer');
    }

    public function getSiswa()
    {

        $siswa = $this->model('Petugas_model')->getSiswa($_POST['nisn']);
        echo json_encode($siswa);
    }

    public function tambahSiswa()
    {
        if ($this->model('Petugas_model')->tambahDataSiswa($_POST) > 0) {
            Flasher::setFlesh('Data siswa berhasil di tambahkan', 'success');
            header('Location:' . BASEURL . '/petugas/siswa');
            exit;
        } else {
            Flasher::setFlesh('Data siswa gagal di tambahkan', 'danger');
            header('Location:' . BASEURL . '/petugas/siswa');
            exit;
        }
    }

    public function editSiswa()
    {
        if ($this->model('Petugas_model')->editDataSiswa($_POST) > 0) {
            Flasher::setFlesh('Data Siswa berhasil di ubah', 'success');
            header('Location:' . BASEURL . '/petugas/siswa');
            exit;
        } else {
            Flasher::setFlesh('Data Siswa gagal di ubah', 'danger');
            header('Location:' . BASEURL . '/petugas/siswa');
            exit;
        }
    }

    public function deleteSiswa($nisn)
    {
        if ($this->model('Petugas_model')->deleteDataSiswa($nisn) > 0) {
            Flasher::setFlesh('Data Siswa berhasil di hapus', 'success');
            header('Location:' . BASEURL . '/petugas/siswa');
            exit;
        } else {
            Flasher::setFlesh('Data Siswa gagal di hapus', 'danger');
            header('Location:' . BASEURL . '/petugas/siswa');
            exit;
        }
    }


    public function setor()
    {

        $data['title'] = 'Transaksi Penyetoran';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        $data['siswa'] = $this->model('Petugas_model')->getAllSiswa();
        $data['setor'] = $this->model('Petugas_model')->getSetoran();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('petugas/setor', $data);
        $this->view('templates/footer');
    }
    public function getSaldo()
    {

        $total = $this->model('Petugas_model')->getSaldoTabungan($_POST['nisn']);
        echo json_encode($total);
        // echo json_encode($this->model('Petugas_model')->getSaldoTabungan($_POST['nisn']));
    }

    public function TSetor()
    {
        if ($this->model('Petugas_model')->transaksiPenyetoran($_POST) > 0) {
            Flasher::setFlesh('Transaksi penyetoran telah berhasil!!', 'success');
            header('Location:' . BASEURL . '/petugas/setor');
            exit;
        } else {
            Flasher::setFlesh('Transaksi penyetoran gagl!!', 'danger');
            header('Location:' . BASEURL . '/petugas/setor');
            exit;
        }
    }

    public function ESetor()
    {
        if ($this->model('Petugas_model')->edittransaksiPenyetoran($_POST) > 0) {
            Flasher::setFlesh('Edit data penyetoran telah berhasil!!', 'success');
            header('Location:' . BASEURL . '/petugas/setor');
            exit;
        } else {
            Flasher::setFlesh('Edit data penyetoran gagl!!', 'danger');
            header('Location:' . BASEURL . '/petugas/setor');
            exit;
        }
    }

    public function getSetor()
    {

        $data = $this->model('Petugas_model')->getSetorTabungan($_POST['id_tabungan']);
        echo json_encode($data);
    }

    public function deleteSetor($id_tabunagn)
    {
        if ($this->model('Petugas_model')->deleteDataSetor($id_tabunagn) > 0) {
            Flasher::setFlesh('Data berhasil di hapus!', 'success');
            header('Location:' . BASEURL . '/petugas/setor');
            exit;
        } else {
            Flasher::setFlesh('Data gagal di hapus!', 'danger');
            header('Location:' . BASEURL . '/petugas/setor');
            exit;
        }
    }


    public function tarik()
    {
        $data['title'] = 'Transaksi Penarikan';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        $data['siswa'] = $this->model('Petugas_model')->getAllSiswa();
        $data['tarik'] = $this->model('Petugas_model')->getTarik();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('petugas/tarik', $data);
        $this->view('templates/footer');
    }

    public function TTarik()
    {
        if ($this->model('Petugas_model')->transaksiPenarikan($_POST) > 0) {
            Flasher::setFlesh('Transaksi penarikan telah berhasil!!', 'success');
            header('Location:' . BASEURL . '/petugas/tarik');
            exit;
        } else {
            Flasher::setFlesh('Transaksi penarikan gagl!!', 'danger');
            header('Location:' . BASEURL . '/petugas/tarik');
            exit;
        }
    }

    public function ETarik()
    {
        if ($this->model('Petugas_model')->editTransaksiPenarikan($_POST) > 0) {
            Flasher::setFlesh('Edit data penarikan telah berhasil di ubah!!', 'success');
            header('Location:' . BASEURL . '/petugas/tarik');
            exit;
        } else {
            Flasher::setFlesh('Edit data penarikan gagl di ubah!!', 'danger');
            header('Location:' . BASEURL . '/petugas/tarik');
            exit;
        }
    }

    public function deleteTarik($id_tabunagn)
    {
        if ($this->model('Petugas_model')->deleteDataSetor($id_tabunagn) > 0) {
            Flasher::setFlesh('Data berhasil di hapus!', 'success');
            header('Location:' . BASEURL . '/petugas/tarik');
            exit;
        } else {
            Flasher::setFlesh('Data gagal di hapus!', 'danger');
            header('Location:' . BASEURL . '/petugas/tarik');
            exit;
        }
    }

    public function tabungan()
    {
        $data['title'] = 'Tabungan';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        $data['siswa'] = $this->model('Petugas_model')->getAllSiswa();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('petugas/tabungan', $data);
        $this->view('templates/footer');
    }

    public function detailtabungan($nisn)
    {
        $data['title'] = 'Detail Tabungan';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        $data['siswa'] = $this->model('Petugas_model')->getAllSiswa();
        $data['tabungan'] = $this->model('Petugas_model')->getTabungan($nisn);
        $data['total'] = $this->model('Petugas_model')->getTotalSaldoNisn($nisn);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('petugas/detailtabungan', $data);
        $this->view('templates/footer');
    }
}
