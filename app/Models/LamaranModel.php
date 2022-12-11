<?php

namespace App\Models;

use CodeIgniter\Model;

class LamaranModel extends Model
{
  protected $table = 'lamaran';
  protected $useTimestamps = true;
  protected $allowedFields = ['id' ,'id_lowongan', 'id_pelamar', 'sk_mahasiswa_aktif', 'cv', 'created_at', 'updated_at'];

  public function getLamaran($id_pelamar)
  {
    return $this->select('lamaran.id,
                          lamaran.id_lowongan,
                          lamaran.id_pelamar,
                          lamaran.updated_at,
                          rekruter.foto_logo,
                          rekruter.nama_perusahaan,
                          lowongan.tipe,
                          lowongan.posisi,
                          lowongan.deadline,
                          pelamar.foto_profil')
                ->join('lowongan', 'lowongan.id=lamaran.id_lowongan')
                ->join('rekruter', 'rekruter.id=lowongan.id_rekruter')
                ->join('pelamar', 'pelamar.id=lamaran.id_pelamar')
                ->where(['lamaran.id_pelamar' => $id_pelamar])
                ->orderBy('lowongan.deadline', 'ASC')
                ->findAll();
  }

  public function getLamaranByIdLowongan($id_lowongan)
  {
    return $this->select('lamaran.id,
                          lamaran.id_lowongan,
                          lamaran.id_pelamar,
                          lamaran.sk_mahasiswa_aktif,
                          lamaran.cv,
                          pelamar.nama,
                          pelamar.email,
                          pelamar.no_telp,
                          pelamar.gender,
                          pelamar.prodi,
                          pelamar.univ,
                          pelamar.foto_profil')
                ->join('lowongan', 'lowongan.id=lamaran.id_lowongan')
                ->join('pelamar', 'pelamar.id=lamaran.id_pelamar')
                ->where(['lamaran.id_lowongan' => $id_lowongan])
                ->orderBy('lamaran.created_at', 'ASC')
                ->findAll();
  }

  public function getAllLamaran()
  {
    return $this->findAll();
  }

  public function search($keyword)
  {
    $this->join('pelamar', 'pelamar.id=lamaran.id_pelamar')->like('nama', $keyword)->orLike('username', $keyword)->orLike('univ', $keyword)->orLike('prodi', $keyword);
  }

}