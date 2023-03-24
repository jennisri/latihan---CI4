<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bidang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bidang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_bidang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);


        $this->forge->addKey('id_bidang', true);
        $this->forge->createTable('bidang');
    }

    public function down()
    {
        $this->forge->dropTable('bidang');
    }
}
