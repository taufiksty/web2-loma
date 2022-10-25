<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lowongan extends Migration
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
      'id_rekruter' => [
        'type'       => 'INT',
        'constraint' => 8,
        'null'       => false,
      ],
      'tipe' => [
        'type' => 'ENUM',
        'constraint' => ['Magang', 'Parttime', 'Volunteer'],
        'null' => false,
      ],
      'posisi' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => false,
      ],
      'lama_kegiatan' => [
        'type' => 'INT',
        'constraint' => 5,
        'null' => false,
      ],
      'deadline' => [
        'type' => 'DATE',
        'null' => false,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('lowongan');
  }

  public function down()
  {
    $this->forge->dropTable('lowongan');
  }
}
