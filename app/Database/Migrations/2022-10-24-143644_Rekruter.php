<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rekruter extends Migration
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
      'nama_perusahaan' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
        'null' => true
      ],
      'username' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
        'null' => false,
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => 150,
        'null' => false,
      ],
      'no_telp_hr' => [
        'type' => 'VARCHAR',
        'constraint' => 20,
        'null' => true,
      ],
      'alamat_perusahaan' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'tentang' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'foto_logo' => [
        'type' => 'VARCHAR',
        'constraint' => 150,
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
    $this->forge->addKey('id', true);
    $this->forge->createTable('rekruter');
  }

  public function down()
  {
    $this->forge->dropTable('rekruter');
  }
}
