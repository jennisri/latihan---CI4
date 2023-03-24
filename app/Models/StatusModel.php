<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table      = 'status';
    protected $primaryKey = 'id_status';
    protected $returnType     = 'array';

    protected $allowedFields = ['nama_status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}