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
                          rekruter.foto_logo,
                          rekruter.nama_perusahaan,
                          lowongan.tipe,
                          lowongan.posisi,
                          lowongan.updated_at,
                          lowongan.deadline,
                          pelamar.foto_profil')
                ->join('lowongan', 'lowongan.id=lamaran.id_lowongan')
                ->join('rekruter', 'rekruter.id=lowongan.id_rekruter')
                ->join('pelamar', 'pelamar.id=lamaran.id_pelamar')
                ->where(['lamaran.id_pelamar' => $id_pelamar])
                ->orderBy('lowongan.deadline', 'ASC')
                ->findAll();
  }

}