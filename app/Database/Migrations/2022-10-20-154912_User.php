<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'handphone' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'slug' => [
               'type'       => 'VARCHAR',
               'constraint' => '100',  
           ],
           'foto' => [
            'type' => 'VARCHAR',
            'constraint' => '200',
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
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
