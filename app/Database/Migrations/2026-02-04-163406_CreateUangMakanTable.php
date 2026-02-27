<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUangMakanTable extends Migration
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
            'no_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'total_bruto' => [
                'type'    => 'BIGINT',
                'default' => 0,
            ],
            'total_netto' => [
                'type'    => 'BIGINT',
                'default' => 0,
            ],
            'seksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'operator_id' => [
                'type'       => 'INT',           // sudah benar sesuai users.id
                'unsigned'   => false,           // sudah benar
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('operator_id'); // index opsional untuk performa query

        // Foreign key sementara DIKOMENTAR untuk hindari error tipe data
        // $this->forge->addForeignKey('operator_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('uang_makan');
    }

    public function down()
    {
        $this->forge->dropTable('uang_makan');
    }
}