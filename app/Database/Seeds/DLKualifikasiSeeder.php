<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DLKualifikasiSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'id' => 1,
        'id_lowongan' => 20103136,
        'kualifikasi' => 'Terbuka untuk semua jurusan',
      ],
      [
        'id' => 2,
        'id_lowongan' => 20103136,
        'kualifikasi' => 'Berpenampilan menarik',
      ],
      [
        'id' => 3,
        'id_lowongan' => 20103136,
        'kualifikasi' => 'Menguasai PHP, MySQL, dan CodeIgniter 4',
      ],
      [
        'id' => 4,
        'id_lowongan' => 20103136,
        'kualifikasi' => 'Penempatan di Jakarta Selatan',
      ]
    ];

    $this->db->table('dl_kualifikasi')->insertBatch($data);
  }
}
