<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RekruterSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    $id = 0;

    for ($i = 0; $i < 16; $i++) {

      if ($i == 0) {
        $id = 18211101;
      } else {
        $id += 1;
      }

      $data = [
        'id' => $id,
        'nama_perusahaan' => $faker->company,
        'username' => $faker->userName,
        'email' => $faker->companyEmail,
        'no_telp_hr' => $faker->phoneNumber,
        'alamat_perusahaan' => $faker->address,
        'tentang' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae reiciendis architecto a voluptates rerum temporibus officia eaque debitis, ad, ullam facere iure. Doloremque inventore quam, expedita nesciunt dolorum ratione beatae!',
        'foto_logo' => 'logo_perusahaan.png',
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];

          $this->db->table('rekruter')->insert($data);
    }
  }
}
