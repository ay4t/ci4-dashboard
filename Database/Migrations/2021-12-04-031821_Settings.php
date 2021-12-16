<?php
namespace IDGdashboard\Database\Migrations;
/*
 * File: 2021-12-04-031821_Settings.php
 * Project: Migrations
 * Created Date: Sa Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Sat Dec 04 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
    public function up()
    {
        // Drop table  if it exists
		$this->forge->dropTable('settings', true);

		// Table structure for table 
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'value' => [
				'type'       => 'TEXT',
				'constraint' => '0',
			],
			'description' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'show_form' => [
				'type'          => 'TINYINT',
				'constraint'    => '1',
				'default'       => '1',
			],

            
			/** create timestamp field */
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp', 
            'deleted_at datetime default null', 
            
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('settings');

    }

    public function down()
    {
        // Drop table  if it exists
		$this->forge->dropTable('settings', true);
    }
}
