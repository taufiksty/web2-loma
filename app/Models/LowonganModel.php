<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
  protected $table = 'lowongan';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_rekruter', 'tipe', 'posisi', 'lama_kegiatan', 'deadline'];

  // public function getLowongan($tipe)
  // {
  //   return $this->where(['tipe' => $tipe])->findAll();
  // }

  public function getMagang($tipe = 'Magang', int $paginate)
  {
    return $this->select()->where(['tipe'=> $tipe])->join('rekruter', 'rekruter.id_rekruter=lowongan.id_rekruter')->paginate($paginate, 'magang');
  }


}
