<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
	protected $table      = 'pegawai';
	protected $primaryKey = 'id_pegawai';
	protected $returnType     = 'array';
	protected $useTimestamps = true;
	protected $allowedFields = ['id_bidang', 'id_status', 'nip', 'nama', 'slug', 'jk', 'alamat', 'email', 'no_telepon', 'gaji', 'tmk', 'foto_diri'];
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	public function getPegawai($slug = false)
	{
		if($slug == false){
			return $this->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}

	
}