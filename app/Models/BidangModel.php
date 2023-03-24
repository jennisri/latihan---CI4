<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
	protected $table      = 'bidang';
	protected $primaryKey = 'id_bidang';
	protected $returnType     = 'array';
	protected $useTimestamps = true;
	protected $allowedFields = ['nama_bidang'];
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	
}