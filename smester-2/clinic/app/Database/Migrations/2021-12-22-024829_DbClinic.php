<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbClinic extends Migration
{
    public function up()
    {
        //CREATE ADD FIELD TABEL USER
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 300
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 350
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'level' => [
                'type' => 'ENUM("Admin","Operator","Owner")'
            ],
            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);

        // SET PRIMARy KEY
        $this->forge->addPrimaryKey('id', true);
        // SET UNIQUE KEY
        $this->forge->addUniqueKey('username', true);

        // CREATE TABEL USER
        $this->forge->createTable('tb_user', true);


        //CREATE ADD FIELD TABEL DOKTER
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);

        // SET PRIMARy KEY
        $this->forge->addPrimaryKey('id', true);

        // CREATE TABEL DOKTER
        $this->forge->createTable('tb_dokter', true);


        //CREATE ADD FIELD TABEL PASIEN
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'tgl_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("Laki Laki","Peremppuan")'
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'umur' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);

        // SET PRIMARy KEY
        $this->forge->addPrimaryKey('id', true);

        // CREATE TABEL PASIEN
        $this->forge->createTable('tb_pasien', true);


        //CREATE ADD FIELD TABEL OBAT
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'harga' => [
                'type' => 'BIGINT',
                'constraint' => 11
            ],
            'keterangan' => [
                'type' => 'TEXT'
            ],
            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);

        // SET PRIMARy KEY
        $this->forge->addPrimaryKey('id', true);

        // CREATE TABEL OBAT
        $this->forge->createTable('tb_obat', true);



        //CREATE ADD FIELD TABEL BEROBAT
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'id_dokter' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_pasien' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'tgl_berobat' => [
                'type' => 'DATE'
            ],
            'keluhan' => [
                'type' => 'TEXT'
            ],
            'hasil_diagnosa' => [
                'type' => 'TEXT'
            ],
            'jenis_berobat' => [
                'type' => 'ENUM("Rawat Jalan","Rawat Inap","Rujuk","Lainnya")'
            ],
            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);

        // SET PRIMARy KEY
        $this->forge->addPrimaryKey('id', true);
        // SET INDEX KEY
        $this->forge->addForeignKey('id_dokter', 'tb_dokter', 'id');
        $this->forge->addForeignKey('id_pasien', 'tb_pasien', 'id');

        // CREATE TABEL BEROBAT
        $this->forge->createTable('tb_berobat', true);



        //CREATE ADD FIELD TABEL RESEP
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'id_berobat' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_obat' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'nama_obat' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'harga' => [
                'type' => 'BIGINT',
                'constraint' => 11
            ],
            'docter_fee' => [
                'type' => 'BIGINT',
                'constraint' => 11
            ],
            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);

        // SET PRIMARy KEY
        $this->forge->addPrimaryKey('id', true);
        // SET INDEX KEY
        $this->forge->addForeignKey('id_berobat', 'tb_berobat', 'id');
        $this->forge->addForeignKey('id_obat', 'tb_obat', 'id');

        // CREATE TABEL RESEP
        $this->forge->createTable('tb_resep', true);
    }

    public function down()
    {
        //
    }
}
