<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
  protected $table = 'lowongan';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_rekruter', 'tipe', 'posisi', 'lama_kegiatan', 'deadline'];

  public function getLowongan(string $tipe, int $paginate)
  {
    return $this->select('lowongan.id, lowongan.id_rekruter, lowongan.tipe, lowongan.posisi, lowongan.deadline, rekruter.nama_perusahaan')->join('rekruter', 'rekruter.id=lowongan.id_rekruter')->where(['tipe'=> $tipe])->orderBy('deadline', 'ASC')->paginate($paginate, $tipe);
  }

  public function search($keyword)
  {
    return $this->like('posisi', $keyword)->orLike('nama_perusahaan', $keyword);
  }

  public function getDetailLowongan(string $tipe, int $id) 
  {
    $where_array = ['tipe' => $tipe, 'lowongan.id' => $id];

    return $this->select('lowongan.id, lowongan.id_rekruter, lowongan.tipe, lowongan.posisi, lowongan.wilayah_penempatan, lowongan.lama_kegiatan, lowongan.deadline, lowongan.updated_at, rekruter.nama_perusahaan, rekruter.foto_logo, rekruter.tentang')->join('rekruter', 'rekruter.id=lowongan.id_rekruter')->where($where_array)->find();
  } 
}
