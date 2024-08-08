<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kursus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kursus' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'durasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id_kursus');
        $this->forge->createTable('kursus');
    }

    public function down()
    {
        $this->forge->dropTable('kursus');
    }
}
