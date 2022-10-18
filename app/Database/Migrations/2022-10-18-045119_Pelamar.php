<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelamar extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_pelamar' => [
        'type'           => 'INT',
        'constraint'     => 8,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'nama' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
        'null'       => true,
      ],
      'username' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => false,
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => false,
      ],
      'no_telp' => [
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => true,
      ],
      'ttl' => [
        'type' => 'DATE',
        'null' => true,
      ],
      'gender' => [
        'type' => 'ENUM',
        'constraint' => ['Laki-laki', 'Perempuan'],
        'null' => true,
      ],
      'univ' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true,
      ],
      'prodi' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'foto_profil' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true,
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
    ]);
    $this->forge->addKey('id_pelamar', true);
    $this->forge->createTable('pelamar');
  }

  public function down()
  {
    $this->forge->dropTable('pelamar');
  }
}
