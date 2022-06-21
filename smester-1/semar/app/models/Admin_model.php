<?php

class Admin_model
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

    // Query Petugas
    public function getAllPetugas()
    {
        $this->db->query('SELECT * FROM petugas');
        return $this->db->resultSet();
    }

    public function getPetugasUsername($username)
    {
        $this->db->query('SELECT * FROM petugas WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }
    public function getPetugas($id_petugas)
    {
        $this->db->query('SELECT * FROM petugas WHERE id_petugas = :id_petugas');
        $this->db->bind('id_petugas', $id_petugas);
        return $this->db->single();
    }

    public function tambahDataPetugas($data)
    {
        $query = "INSERT INTO petugas
                    VALUES
                ('', :username, :password, :nama, :jk, :level, :status, :tgl_join)";

        $this->db->query($query);
        $this->db->bind('username', $this->test_input($data['username']));
        $this->db->bind('password', $data['password']);
        $this->db->bind('nama', $this->test_input($data['nama']));
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('tgl_join', time());

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataPetugas($data)
    {
        $query = "UPDATE petugas
                    SET
                username = :username, 
                nama = :nama, 
                jk = :jk, 
                level = :level, 
                status = :status, 
                tgl_join = :tgl_join 
                WHERE id_petugas = :id_petugas";

        $this->db->query($query);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('username', $this->test_input($data['username']));
        $this->db->bind('nama', $this->test_input($data['nama']));
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('tgl_join', time());

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDataPetugas($id_petugas)
    {
        $query = "DELETE FROM petugas WHERE id_petugas = :id_petugas";
        $this->db->query($query);
        $this->db->bind('id_petugas', $id_petugas);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
