<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_materi' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'judul_materi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_materi' => [
                'type' => 'TEXT',
            ],
            'link_materi' => [
                'type' => 'TEXT',
            ],
            'id_kursus' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id_materi');
        $this->forge->addForeignKey('id_kursus', 'kursus', 'id_kursus', 'CASCADE', 'CASCADE');
        $this->forge->createTable('materi');
    }

    public function down()
    {
        $this->forge->dropTable('materi');
    }
}
