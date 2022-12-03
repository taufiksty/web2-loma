<?php

namespace App\Models;

use CodeIgniter\Model;

class PelamarModel extends Model
{
  protected $table = 'pelamar';
  protected $useTimestamps = true;
  protected $allowedFields = ['id', 'nama', 'username', 'email', 'no_telp', 'alamat', 'tl', 'gender', 'univ', 'prodi', 'foto_profil', 'created_at'];

  public function getPelamar($id)
  {
    return $this->where(['id' => $id])->first();
  }

  public function getAllPelamar()
  {
    return $this->findAll();
  }

}
