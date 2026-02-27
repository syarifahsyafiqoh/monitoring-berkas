<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGupTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'uraian' => [
                'type' => 'TEXT',
            ],
            'seksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'operator_id' => [
                'type'       => 'INT',           // sesuai id di users (INT biasa)
                'unsigned'   => false,           // tidak pakai unsigned
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
        $this->forge->addKey('operator_id'); // index untuk query cepat

        // Foreign key DIKOMENTAR dulu untuk hindari error tipe data
        // $this->forge->addForeignKey('operator_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('gup');
    }

    public function down()
    {
        $this->forge->dropTable('gup');
    }

}
