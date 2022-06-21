<?php

class Petugas_model
{
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getCountSiswa()
    {
        $this->db->query('SELECT nama FROM ' . $this->table . ' WHERE status = :status');
        $this->db->bind('status', 'Aktif');
        return $this->db->rowCount();
    }
    public function getAllSiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getSiswaE($email)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }
    public function getSiswa($nisn)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nisn=:nisn');
        $this->db->bind('nisn', $nisn);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO siswa
                    VALUES
                (:nisn, :nama, :jk, :id_kelas, :status, :th_masuk)";

        $this->db->query($query);
        $this->db->bind('nisn', $this->test_input($data['nisn']));
        $this->db->bind('nama', $this->test_input($data['nama']));
        $this->db->bind('jk', $this->test_input($data['jk']));
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('status', $this->test_input($data['status']));
        $this->db->bind('th_masuk', time());

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataSiswa($data)
    {
        $query = "UPDATE siswa SET
                    nama = :nama, 
                    jk = :jk, 
                    id_kelas = :id_kelas, 
                    status = :status, 
                    th_masuk = :th_masuk
                WHERE nisn = :nisn";

        $this->db->query($query);
        $this->db->bind('nama', $this->test_input($data['nama']));
        $this->db->bind('jk', $this->test_input($data['jk']));
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('status', $this->test_input($data['status']));
        $this->db->bind('th_masuk', time());
        $this->db->bind('nisn', $data['nisn']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDataSiswa($nisn)
    {
        $query = "DELETE FROM siswa WHERE nisn = :nisn";
        $this->db->query($query);
        $this->db->bind('nisn', $this->test_input($nisn));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllTabungan()
    {
        $this->db->query('SELECT * FROM tabungan');
        return $this->db->resultSet();
    }

    public function getSetorTabungan($id_tabungan)
    {
        $this->db->query('SELECT * FROM tabungan WHERE id_tabungan = :id_tabungan');
        $this->db->bind('id_tabungan', $id_tabungan);
        return $this->db->single();
    }

    public function getSetoran()
    {
        $this->db->query('SELECT s.nisn, s.nama, t.id_tabungan, t.tgl, t.setor, t.nama_petugas FROM siswa s 
                                JOIN tabungan t ON s.nisn = t.nisn 
                            WHERE jenis = :jenis ORDER BY tgl DESC, id_tabungan DESC');
        $this->db->bind('jenis', 'Setor');
        return $this->db->resultSet();
    }

    public function deleteDataSetor($id_tabungan)
    {
        $query = "DELETE FROM tabungan WHERE id_tabungan = :id_tabungan";
        $this->db->query($query);
        $this->db->bind('id_tabungan', $id_tabungan);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getSaldoTabungan($nisn)
    {
        // select sum(setor)-sum(tarik) as Total from tb_tabungan where nis
        $this->db->query('SELECT SUM(setor)-SUM(tarik) as st FROM tabungan WHERE nisn = :nisn');
        $this->db->bind('nisn', $nisn);
        return $this->db->single();
    }

    public function getTotalSaldo()
    {
        // select sum(setor)-sum(tarik) as Total from tb_tabungan where nis
        $this->db->query('SELECT SUM(setor)-SUM(tarik) as ts FROM tabungan');
        return $this->db->single();
    }
    public function getTotalSaldoNisn($nisn)
    {
        // select sum(setor)-sum(tarik) as Total from tb_tabungan where nis
        $this->db->query('SELECT SUM(setor)-SUM(tarik) as ts FROM tabungan WHERE nisn = :nisn');
        $this->db->bind('nisn', $nisn);
        return $this->db->single();
    }

    public function getTotalSetor($jenis)
    {
        $this->db->query('SELECT SUM(setor) as total FROM tabungan WHERE jenis = :jenis');
        $this->db->bind('jenis', $jenis);
        return $this->db->single();
    }

    public function transaksiPenyetoran($data)
    {
        $query = "INSERT INTO tabungan
                    VALUES
                ('', :nisn, :setor, :tarik, :tgl, :jenis, :nama_petugas)";
        $setor = preg_replace("/[^0-9]/", "", $data['setor']);
        $this->db->query($query);
        $this->db->bind('nisn', $this->test_input($data['nisn']));
        $this->db->bind('setor', $setor);
        $this->db->bind('tarik', 0);
        $this->db->bind('tgl', time());
        $this->db->bind('jenis', 'Setor');
        $this->db->bind('nama_petugas', $this->test_input($data['nama_petugas']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edittransaksiPenyetoran($data)
    {
        $query = "UPDATE tabungan
                    SET
                nisn = :nisn, 
                setor = :setor, 
                tgl = :tgl, 
                nama_petugas = :nama_petugas
                WHERE id_tabungan = :id_tabungan";
        $setor = preg_replace("/[^0-9]/", "", $data['setor']);
        $this->db->query($query);
        $this->db->bind('nisn', $this->test_input($data['nisn']));
        $this->db->bind('setor', $setor);
        $this->db->bind('tgl', time());
        $this->db->bind('nama_petugas', $this->test_input($data['nama_petugas']));
        $this->db->bind('id_tabungan', $data['id_tabungan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTarik()
    {
        $this->db->query('SELECT s.nisn, s.nama, t.id_tabungan, t.tgl, t.tarik, t.nama_petugas FROM siswa s 
                                JOIN tabungan t ON s.nisn = t.nisn 
                            WHERE jenis = :jenis ORDER BY tgl DESC, id_tabungan DESC');
        $this->db->bind('jenis', 'Tarik');
        return $this->db->resultSet();
    }

    public function getTotalTarik($jenis)
    {
        $this->db->query('SELECT SUM(tarik) as total FROM tabungan WHERE jenis = :jenis');
        $this->db->bind('jenis', $jenis);
        return $this->db->single();
    }

    public function transaksiPenarikan($data)
    {
        $query = "INSERT INTO tabungan
                    VALUES
                ('', :nisn, :setor, :tarik, :tgl, :jenis, :nama_petugas)";
        $tarik = preg_replace("/[^0-9]/", "", $data['tarik']);
        $this->db->query($query);
        $this->db->bind('nisn', $this->test_input($data['nisn']));
        $this->db->bind('setor', 0);
        $this->db->bind('tarik', $tarik);
        $this->db->bind('tgl', time());
        $this->db->bind('jenis', 'Tarik');
        $this->db->bind('nama_petugas', $this->test_input($data['nama_petugas']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editTransaksiPenarikan($data)
    {
        $query = "UPDATE tabungan
                    SET
                nisn = :nisn, 
                tarik = :tarik, 
                tgl = :tgl, 
                nama_petugas = :nama_petugas
                WHERE id_tabungan = :id_tabungan";
        $tarik = preg_replace("/[^0-9]/", "", $data['tarik']);
        $this->db->query($query);
        $this->db->bind('nisn', $this->test_input($data['nisn']));
        $this->db->bind('tarik', $tarik);
        $this->db->bind('tgl', time());
        $this->db->bind('nama_petugas', $this->test_input($data['nama_petugas']));
        $this->db->bind('id_tabungan', $data['id_tabungan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTabungan($nisn)
    {
        $query = "SELECT * FROM tabungan WHERE nisn = :nisn";

        $this->db->query($query);
        $this->db->bind('nisn', $nisn);

        $this->db->execute();
        return $this->db->resultSet();
    }
}
