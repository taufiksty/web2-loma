<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lamaran extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'constraint'     => 8,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'id_lowongan' => [
        'type'       => 'INT',
        'constraint' => 8,
        'null'       => false,
      ],
      'id_pelamar' => [
        'type' => 'INT',
        'constraint' => 8,
        'null' => false,
      ],
      'sk_mahasiswa_aktif' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => false,
      ],
      'cv' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => false
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => false
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('lamaran');
  }

  public function down()
  {
    $this->forge->dropTable('lamaran');
  }
}
