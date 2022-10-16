<?php

namespace App\Models;

use CodeIgniter\Model;

class PelamarModel extends Model
{
  protected $table = 'pelamar';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pelamar', 'nama', 'email', 'no_telp', 'ttl', 'gender', 'univ', 'prodi'];

  public function getPelamar($id_pelamar)
  {
    return $this->where(['id_pelamar' => $id_pelamar])->first();
  }
}
