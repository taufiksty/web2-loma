<?php

namespace App\Models;

use CodeIgniter\Model;

class PelamarModel extends Model
{
  protected $table = 'pelamar';
  protected $useTimestamps = true;
  protected $allowedFields = ['id', 'nama', 'username', 'email', 'no_telp', 'alamat', 'tl', 'gender', 'univ', 'prodi', 'foto_profil'];

  public function getPelamar($id)
  {
    return $this->where(['id' => $id])->first();
  }

}
