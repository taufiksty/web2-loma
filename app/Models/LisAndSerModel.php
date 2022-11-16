<?php

namespace App\Models;

use CodeIgniter\Model;

class LisAndSerModel extends Model
{
  protected $table = 'lis_and_ser';
  protected $useTimestamps = true;
  protected $allowedFields = ['id', 'id_pelamar', 'ls', 'id_kred', 'created_at', 'updated_at'];

  public function getLisAndSer($id_pelamar)
  {
    return $this->where(['id_pelamar' => $id_pelamar])->findAll();
  }

  public function getLisAndSerIdLast()
  {
    return $this->select('lis_and_ser.id')->orderBy('lis_and_ser.id', 'DESC')->limit(1)->find();
  }
  
  public function getLisAndSerId(string $id_ls)
  {
    return $this->select('lis_and_ser.id')->where(['id' => $id_ls])->find();
  }

}
