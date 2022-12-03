<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
      'email' => [
        'type'       => 'VARCHAR',
        'constraint' => 100,
        'null'       => false,
      ],
      'nama' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
        'null' => false,
      ],
      'no_telp' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true,
      ],
      'location' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true
      ],
      'facebook' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true
      ],
      'twitter' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true
      ],
      'instagram' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => true
      ],
      'foto_profil' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
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
    $this->forge->createTable('admin');
  }

  public function down()
  {
    $this->forge->dropTable('admin');
  }
}
