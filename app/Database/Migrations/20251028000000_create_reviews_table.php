<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false,
            ],
            'rating' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
            ],
            'comment' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('reviews', true);
    }

    public function down()
    {
        $this->forge->dropTable('reviews', true);
    }
}
