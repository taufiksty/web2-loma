<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LisAndSerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_pelamar' => 19211101,
            'ls' => 'Machine Learning Dasar - Dicoding',
            'id_kred' => 'MLD-3298782',
            'updated_at' => Time::now()
        ];

        $this->db->query('INSERT INTO lis_and_ser (id_pelamar, ls, id_kred, updated_at) VALUES(:id_pelamar:, :ls:, :id_kred:, :updated_at:)', $data);
    }
}
