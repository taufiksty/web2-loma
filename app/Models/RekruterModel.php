<?php

namespace App\Models;

use CodeIgniter\Model;

class RekruterModel extends Model
{
  protected $table = 'rekruter';
  protected $useTimestamps = true;
  protected $allowedFields = ['id', 'id_rekruter', 'nama_perusahaan', 'username', 'email', 'no_telp_hr', 'alamat_perusahaan', 'tentang', 'foto_logo', 'created_at', 'update_at'];

  public function getRekruter($id_rekruter)
  {
    return $this->where(['id_rekruter' => $id_rekruter])->first();
  }

}
