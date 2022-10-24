<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RekruterSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    $id = 0;

    for ($i = 0; $i < 6; $i++) {

      if ($i == 0) {
        $id = 18211101;
      } else {
        $id += 1;
      }

      $data = [
        'id' => $id,
        'id_rekruter' => '',
        'username' => $faker->userName,
        'email' => $faker->email,
        'no_telp' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'foto_profil' => 'Jisoo.jpg',
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];

      $this->db->table('pelamar')->insert($data);
    }
  }
}
