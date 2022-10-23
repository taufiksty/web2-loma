<?php

namespace App\Models;

use CodeIgniter\Model;

class LisAndSerModel extends Model
{
  protected $table = 'lis_and_ser';
  protected $useTimestamps = true;
  protected $allowedFields = ['id', 'ls', 'id_kred', 'updated_at'];

  public function getLisAndSer($id)
  {
    return $this->where(['id' => $id])->findAll();
  }
  
}
