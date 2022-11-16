<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DLDeskripsiSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'id' => 1,
        'id_lowongan' => 20103136,
        'deskripsi' => 'Membuat content calendar baik mingguan atau bulanan',
      ],
      [
        'id' => 2,
        'id_lowongan' => 20103136,
        'deskripsi' => 'Berinteraksi dengan costumer dalam akun media sosial dari brand yang diurus',
      ],
      [
        'id' => 3,
        'id_lowongan' => 20103136,
        'deskripsi' => 'Membalas komentar, melempar pertanyaan, posting konten yang engaging',
      ],
      [
        'id' => 4,
        'id_lowongan' => 20103136,
        'deskripsi' => 'Maintenance Web App',
      ]
    ];

    $this->db->table('dl_deskripsi')->insertBatch($data);
  }
}
