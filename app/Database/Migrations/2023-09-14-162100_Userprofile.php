<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Userprofile extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'profilename' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('userprofiles');
    }

    public function down()
    {
        $this->forge->dropTable('userprofiles');
    }
}
