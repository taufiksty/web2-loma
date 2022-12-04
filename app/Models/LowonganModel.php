<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
  protected $table = 'lowongan';
  protected $useTimestamps = true;
  protected $allowedFields = ['id' ,'id_rekruter', 'tipe', 'posisi', 'wilayah_penempatan', 'lama_kegiatan', 'deadline', 'created_at', 'updated_at'];
  protected $primaryKey = 'id';
  // protected $useSoftDeletes = false;

  // public function getAllLowongan()
  // {
  //   $this->findAll();
  // }

  public function getLowonganId()
  {
    return $this->select('lowongan.id')->orderBy('lowongan.id', 'DESC')->limit(1)->find();
  }

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
    $where_array = ['lowongan.tipe' => $tipe, 'lowongan.id' => $id];

    return $this->select('lowongan.id, lowongan.id_rekruter, lowongan.tipe, lowongan.posisi, lowongan.wilayah_penempatan, lowongan.lama_kegiatan, lowongan.deadline, lowongan.updated_at, rekruter.nama_perusahaan, rekruter.foto_logo, rekruter.tentang')->join('rekruter', 'rekruter.id=lowongan.id_rekruter')->where($where_array)->find();
  } 

  public function getDaftarLowongan(int $id_rekruter, int $paginate)
  {
    return $this->select('lowongan.id, lowongan.id_rekruter, lowongan.tipe, lowongan.posisi, lowongan.wilayah_penempatan, lowongan.lama_kegiatan, lowongan.deadline, lowongan.updated_at')->where(['id_rekruter'=> $id_rekruter])->orderBy('updated_at', 'DESC')->paginate($paginate, 'DaftarLowongan');
  }

  public function searchDaftarLowongan($keyword)
  {
    return $this->like('tipe', $keyword)->orLike('posisi', $keyword);
  }

  public function getDataLowongan(int $id)
  {
    $this->where(['id' => $id])->first();
  }
}

