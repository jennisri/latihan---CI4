<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'user';
	protected $primaryKey = 'id_user';
	protected $returnType     = 'array';
	protected $useTimestamps = true;
	protected $allowedFields = ['nama', 'alamat', 'handphone', 'slug', 'foto'];
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	public function getUser($slug = false)
	{
		if($slug == false){
			return $this->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}

	
}