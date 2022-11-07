<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LisAndSerSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'id' => 1,
        'id_pelamar' => 19211101,
        'ls' => 'Machine Learning Dasar - Dicoding',
        'id_kred' => 'MLD-3298782',
        'updated_at' => Time::now()
      ],
      [
        'id' => 2,
        'id_pelamar' => 19211101,
        'ls' => 'Backend Developer - Meta',
        'id_kred' => 'META-123101',
        'updated_at' => Time::now()
      ]
    ];

    $this->db->table('lis_and_ser')->insertBatch($data);
  }
}
