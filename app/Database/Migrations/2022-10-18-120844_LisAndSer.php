<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LisAndSer extends Migration
{
    public function up()
  {
    $this->forge->addField([
      'id_pelamar' => [
        'type'           => 'INT',
        'constraint'     => 8,
        'unsigned'       => true,
        'auto_increment' => false,
      ],
      'ls' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
        'null'       => false,
      ],
      'id_kred' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => false,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => false,
      ],
    ]);
    // $this->forge->addKey('id_pelamar', true);
    $this->forge->createTable('lis_and_ser');
  }

  public function down()
  {
    $this->forge->dropTable('lis_and_ser');
  }
}
