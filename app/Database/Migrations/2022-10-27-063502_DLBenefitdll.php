<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DLBenefitdll extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lowongan' => [
              'type'           => 'INT',
              'constraint'     => 8,
              'unsigned'       => true,
            ],
            'benefit' => [
                'type'         => 'VARCHAR',
                'constraint'   => 255,
                'null'         => false
            ]
            ]);

        $this->forge->createTable('dl_benefit');
    }

    public function down()
    {
        $this->forge->dropTable('dl_benefit');
    }
}
