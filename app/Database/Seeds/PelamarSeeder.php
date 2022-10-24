<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PelamarSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    $id = 0;

    for ($i = 0; $i < 5; $i++) {

      if ($i == 0) {
        $id = 19211101;
      } else {
        $id += 1;
      }

      $data = [
        'id' => $id,
        'nama' => $faker->name,
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
