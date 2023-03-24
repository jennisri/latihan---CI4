<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_bidang' => [
             'type'           => 'INT',
             'constraint'     => 11,
         ],
         'id_status' => [
            'type'           => 'INT',
            'constraint'     => 11,
        ],
        'nip' => [
            'type'       => 'VARCHAR',
            'constraint' => '50',
        ],
        'nama' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'jk' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'alamat' =>[
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'email' =>[
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'no_telepon' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'gaji' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'tmk' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'foto_diri' => [
            'type'       => 'VARCHAR',
            'constraint' => '150',
        ],
        'created_at' => [
            'type'      => 'DATETIME',
            'null'      => TRUE
        ],
        'updated_at' => [
            'type'      => 'DATETIME',
            'null'      => TRUE
        ],

    ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
