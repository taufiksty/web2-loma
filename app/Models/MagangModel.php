<?php

namespace App\Models;

use CodeIgniter\Model;

class MagangModel extends Model
{
  protected $table = 'magang';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_rekruter', 'tipe', 'posisi', 'lama_kegiatan', 'deadline'];

  public function getLowongan($tipe)
  {
    return $this->where(['tipe' => $tipe])->findAll();
  }
}
