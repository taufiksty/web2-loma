<?php

namespace App\Models;

use CodeIgniter\Model;

class DLKualifikasiModel extends Model
{
  protected $table = 'dl_kualifikasi';
  protected $allowedFields = ['id', 'id_lowongan', 'kualifikasi'];

  public function getDLKualifikasi($id_lowongan)
  {
    return $this->where(['id_lowongan' => $id_lowongan])->findAll();
  }
}
