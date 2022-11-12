<?php

namespace App\Models;

use CodeIgniter\Model;

class DLDeskripsiModel extends Model
{
  protected $table = 'dl_deskripsi';
  protected $allowedFields = ['id', 'id_lowongan', 'deskripsi'];

  public function getDLDeskripsi($id_lowongan)
  {
    return $this->where(['id_lowongan' => $id_lowongan])->findAll();
  }
}