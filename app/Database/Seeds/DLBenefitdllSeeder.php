<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DLBenefitdllSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'id' => 1,
        'id_lowongan' => 20103136,
        'benefit' => 'Gaji',
      ],
      [
        'id' => 2,
        'id_lowongan' => 20103136,
        'benefit' => 'Uang makan',
      ],
      [
        'id' => 3,
        'id_lowongan' => 20103136,
        'benefit' => 'Sertifikat magang',
      ],
    ];

    $this->db->table('dl_benefit')->insertBatch($data);
  }
}
