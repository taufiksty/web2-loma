<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DLKualifikasi extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'id_lowongan' => [
        'type'           => 'INT',
        'constraint'     => 8,
        'unsigned'       => true,
      ],
      'kualifikasi' => [
        'type'         => 'VARCHAR',
        'constraint'   => 255,
        'null'         => false
      ]
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('dl_kualifikasi');
  }

  public function down()
  {
    $this->forge->dropTable('dl_kualifikasi');
  }
}
