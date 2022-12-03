<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'id' => 1,
        'email' => 'admin1@gmail.com',
        'nama' => 'Aksara Indah Semesta',
        'no_telp' => '081311890234',
        'location' => 'Indonesia',
        'facebook' => 'aksaraindahsemesta',
        'twitter' => 'aksaraindahsemesta',
        'instagram' => 'aksaraindahsemesta',
        'foto_profil' => 'default-profile.jpg'
      ],
      [
        'id' => 2,
        'email' => 'admin2@gmail.com',
        'nama' => 'Jack Dorsey',
        'no_telp' => '08512490347',
        'location' => 'USA',
        'facebook' => 'jackdorsey',
        'twitter' => 'jackdorsey',
        'instagram' => 'jackdorsey',
        'foto_profil' => 'default-profile.jpg'
      ],
    ];

    $this->db->table('admin')->insertBatch($data);
  }
}
