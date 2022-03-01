<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelKota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kota_id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'kota_nama' => ['type' => 'VARCHAR', 'constraint' => '100'],
        ]);

        $this->forge->addKey('kota_id', true);
        $this->forge->createTable('kota');
    }

    public function down()
    {
        $this->forge->dropTable('kota');
    }
}
