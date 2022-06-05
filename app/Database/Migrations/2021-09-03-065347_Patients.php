<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Patients extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'name' => ['type' => 'varchar', 'constraint' => 255],
			'place_of_birth' => ['type' => 'varchar', 'constraint' => 100],
			'date_of_birth' => ['type' => 'date'],
			'address' => ['type' => 'varchar', 'constraint' => 255],
			'age' => ['type' => 'int', 'constraint' => 3],
			'head_of_family' => ['type' => 'varchar', 'constraint' => 255],
			'number_family_card' => ['type' => 'varchar', 'constraint' => '20'],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('patients');
	}

	public function down()
	{
		$this->forge->dropTable('patients');
	}
}
