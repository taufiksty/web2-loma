<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LowonganSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    $id = 0;
    $id_rekruter = 0;

    for ($i = 0; $i < 80; $i++) {

      if ($i == 0) {
        $id = 20103111;
        $id_rekruter = 18211101;
      } else {
        $id += 1;
        if ($i % 5 == 0) {
          $id_rekruter += 1;
        } else {
          $id_rekruter = $id_rekruter;
        }
      }

      $data = [
        'id' => $id,
        'id_rekruter' => $id_rekruter,
        'tipe' => $faker->randomElement(['Magang', 'Parttime', 'Volunteer']),
        'posisi' => 'UI/UX Designer',
        'lama_kegiatan' => 6,
        'deadline' => $faker->date,
        'updated_at' => Time::now()
      ];

      $this->db->table('lowongan')->insert($data);
    }
  }
}
