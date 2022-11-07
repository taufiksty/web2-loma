<?php

namespace App\Models;

use CodeIgniter\Model;

class DLBenefitdllModel extends Model
{
  protected $table = 'dl_benefit';
  protected $allowedFields = ['id', 'id_lowongan', 'benefit'];

  public function getDLBenefitdll($id_lowongan)
  {
    return $this->where(['id_lowongan' => $id_lowongan])->findAll();
  }
}