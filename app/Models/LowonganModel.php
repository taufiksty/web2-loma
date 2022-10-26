<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
  protected $table = 'lowongan';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_rekruter', 'tipe', 'posisi', 'lama_kegiatan', 'deadline'];

  public function getMagang($tipe = 'Magang', int $paginate)
  {
    return $this->join('rekruter', 'rekruter.id_rekruter=lowongan.id_rekruter')->where(['tipe'=> $tipe])->paginate($paginate, 'magang');
  }

  public function search($keyword)
  {
    return $this->like('posisi', $keyword)->orLike('nama_perusahaan', $keyword);
  }
}
