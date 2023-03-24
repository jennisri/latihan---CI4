<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_bidang' => 'Admin',
            ],
            [
                'nama_bidang' => 'Staff Gudang',
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO user (nama_bidang) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('bidang')->insertBatch($data);

    }
}
