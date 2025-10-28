<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToReviews extends Migration
{
    public function up()
    {
        $fields = [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ];
        $this->forge->addColumn('reviews', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('reviews', 'image');
    }
}
