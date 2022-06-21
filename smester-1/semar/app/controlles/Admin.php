<?php
class Admin extends Controller
{
    public function __construct()
    {
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        if (!Flasher::session()) {
            header('Location:' . BASEURL . '/auth');
            exit;
        } elseif ($data['petugas']['level'] == 'admin') {
            header('Location:' . BASEURL . '/petugas');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function petugas()
    {
        $data['title'] = 'Data Petugas';
        $data['petugas'] = $this->model('Admin_model')->getPetugasUsername(Flasher::session());
        $data['datapetugas'] = $this->model('Admin_model')->getAllPetugas();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('admin/petugas', $data);
        $this->view('templates/footer');
    }

    public function tambahPetugas()
    {
        if ($this->model('Admin_model')->tambahDataPetugas($_POST) > 0) {
            Flasher::setFlesh('Data Petugas berhasil di tambahkan', 'success');
            header('Location:' . BASEURL . '/admin/petugas');
            exit;
        } else {
            Flasher::setFlesh('Data Petugas gagal di tambahkan', 'danger');
            header('Location:' . BASEURL . '/admin/petugas');
            exit;
        }
    }

    public function getPetugas()
    {

        $petugas = $this->model('Admin_model')->getPetugas($_POST['id_petugas']);
        echo json_encode($petugas);
    }

    public function editPetugas()
    {
        if ($this->model('Admin_model')->editDataPetugas($_POST) > 0) {
            Flasher::setFlesh('Data Petugas berhasil di ubah', 'success');
            header('Location:' . BASEURL . '/admin/petugas');
            exit;
        } else {
            Flasher::setFlesh('Data Petugas gagal di ubah', 'danger');
            header('Location:' . BASEURL . '/admin/petugas');
            exit;
        }
    }

    public function deletePetugas($id_petugas)
    {
        if ($this->model('Admin_model')->deleteDataPetugas($id_petugas) > 0) {
            Flasher::setFlesh('Data Petugas berhasil di hapus', 'success');
            header('Location:' . BASEURL . '/admin/petugas');
            exit;
        } else {
            Flasher::setFlesh('Data Petugas gagal di hapus', 'danger');
            header('Location:' . BASEURL . '/admin/petugas');
            exit;
        }
    }
}
