<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FamilyPlannings extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'type' => ['type' => 'int', 'constraint' => 1],
			'number_of_children' => ['type' => 'int', 'constraint' => 2],
			'last_child_age' => ['type' => 'int', 'constraint' => 2],
			'supporting_investigation' => ['type' => 'varchar', 'constraint' => 255],
			'revisit' => ['type' => 'date'],
			'weight' => ['type' => 'int', 'constraint' => 10],
			'blood' => ['type' => 'varchar', 'constraint' => 6],
			'description' => ['type' => 'text'],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'varchar', 'constraint' => 50],
			'examiner' => ['type' => 'varchar', 'constraint' => 255],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('family_plannings');
	}

	public function down()
	{
		$this->forge->dropForeignKey('family_plannings', 'family_plannings_patient_id_foreign');
		$this->forge->dropTable('family_plannings');
	}
}
