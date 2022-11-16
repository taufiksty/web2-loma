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
        'tl' => $faker->date('Y-m-d'),
        'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        'univ' => $faker->randomElement(['Universitas Bina Sarana Informatika', 'Universitas Gunadarma', 'Universitas Telkom', 'Universitas Bina Nusantara', 'Universitas Bina Sarana Informatika']),
        'prodi' => $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Ilmu Komunikasi', 'Sastra Inggris', 'Manajemen']),
        'foto_profil' => 'default-profile.jpg',
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];

      $this->db->table('pelamar')->insert($data);
    }
  }
}
