<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reference extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'husband' => ['type' => 'varchar', 'constraint' => 255],
			'datetime' => ['type' => 'datetime'],
			'ref_to' => ['type' => 'varchar', 'constraint' => 255],
			'cause' => ['type' => 'varchar', 'constraint' => 255],
			'diagnose' => ['type' => 'varchar', 'constraint' => 255],
			'act' => ['type' => 'varchar', 'constraint' => 255],
			'who' => ['type' => 'varchar', 'constraint' => 255],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('reference');
	}

	public function down()
	{
		$this->forge->dropForeignKey('reference', 'reference_patient_id_foreign');
		$this->forge->dropTable('reference');
	}
}
