<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class StatusSeeder extends Seeder
{
    public function run()
    {
       $data = [
        [
            'nama_status' => 'TKS',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ],
        [
            'nama_status' => 'Honorer',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ]
    ];

        // Simple Queries
        // $this->db->query('INSERT INTO user (nama_bidang) VALUES(:username:, :email:)', $data);

        // Using Query Builder
    $this->db->table('status')->insertBatch($data);
}
}
