<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelPengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengguna_id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pengguna_email' => ['type' => 'VARCHAR', 'constraint' => '100', 'unique' => true],
            'pengguna_sandi' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'kota_id' => ['type' => 'INT', 'unsigned' => true],
        ]);

        $this->forge->addKey('pengguna_id', true);
        // Kota_id di tabel pengguna terhubung dengan tabel kota pada kolom kota_id
        $this->forge->addforeignKey('kota_id', 'kota', 'kota_id');
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
