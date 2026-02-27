<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBerkasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_berkas' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'jenis_modul' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_modul' => [
                'type'       => 'BIGINT',
                'unsigned'   => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'menunggu_verifikasi', 'diverifikasi', 'disetujui', 'ditolak'],
                'default'    => 'draft',
            ],
            'catatan_bendahara' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'operator_id' => [
                'type'       => 'INT',           // ← UBAH JADI INT (sesuai users.id yang INT biasa)
                'unsigned'   => false,           // ← UBAH JADI false atau hapus baris ini
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('operator_id'); // index untuk query cepat

        // Foreign key operator_id → DIKOMENTAR dulu karena users.id adalah INT biasa
        // $this->forge->addForeignKey('operator_id', 'users', 'id', 'CASCADE', 'CASCADE');

        // Foreign key id_modul → DIKOMENTAR dulu karena tabel perjalanan_dinas belum ada saat migrasi ini jalan
        // $this->forge->addForeignKey('id_modul', 'perjalanan_dinas', 'id', 'CASCADE', 'CASCADE');

        // Catatan: foreign key ke modul lain (gaji_induk, dll) nanti ditambahkan manual atau di migration terpisah
        // Supaya migrasi tidak error karena urutan tabel

        $this->forge->createTable('berkas');
    }

    public function down()
    {
        $this->forge->dropTable('berkas');
    }
}