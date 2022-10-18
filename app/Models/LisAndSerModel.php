<?php

namespace App\Models;

use CodeIgniter\Model;

class LisAndSerModel extends Model
{
  protected $table = 'lis_and_ser';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pelamar', 'ls', 'id_kred', 'updated_at'];

  public function getLisAndSer($id_pelamar)
  {
    return $this->where(['id_pelamar' => $id_pelamar])->findAll();
  }
  
}
