<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Treatments extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'supporting_investigation' => ['type' => 'varchar', 'constraint' => 255],
			'weight' => ['type' => 'double'],
			'body_temperature' => ['type' => 'double'],
			'tension' => ['type' => 'varchar', 'constraint' => 100],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'varchar', 'constraint' => 50],
			'examiner' => ['type' => 'varchar', 'constraint' => 255],
			'code' => ['type' => 'varchar', 'constraint' => 5],
			'diagnose' => ['type' => 'varchar', 'constraint' => 100],
			'complaints' => ['type' => 'varchar', 'constraint' => 100],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('treatments');
	}

	public function down()
	{
		$this->forge->dropForeignKey('treatments', 'treatments_patient_id_foreign');
		$this->forge->dropTable('treatments');
	}
}
