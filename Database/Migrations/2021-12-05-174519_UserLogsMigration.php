<?php

namespace IDGdashboard\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserLogsMigration extends Migration
{

    protected $DBGroup = 'default';


    public function up()
    {

        // $this->forge->dropTable('userlogs', true);
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => '40',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned'       => true,
            ],
            'key' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'value' => [
                'type'       => 'TEXT',
                'constraint' => '0',
            ],
            'ipaddress' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'useragent' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            /** create timestamp field */
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',

        ]);
        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');

        $this->forge->createTable('userlogs');
    }

    public function down()
    {
        //
        $this->forge->dropTable('userlogs', true);
    }
}
