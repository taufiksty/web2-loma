<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
  protected $table = 'admin';
  protected $useTimeStamps = true;
  protected $primaryKey = 'id';
  protected $allowedFields = ['id', 'email', 'nama', 'no_telp', 'location', 'facebook', 'twitter', 'instagram', 'foto_profil'];

  public function getAdmin($id)
  {
    return $this->where(['id' => $id])->first();
  }

  public function getCountAdmin()
  {
    return count($this->findAll());
  }
}
