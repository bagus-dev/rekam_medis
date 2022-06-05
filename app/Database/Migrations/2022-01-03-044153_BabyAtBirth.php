<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BabyAtBirth extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'husband_name' => ['type' => 'varchar', 'constraint' => 255],
			'datetime' => ['type' => 'datetime'],
			'gestational_age' => ['type' => 'int', 'constraint' => 1],
			'birth_attendant' => ['type' => 'varchar', 'constraint' => 255],
			'how' => ['type' => 'int', 'constraint' => 1],
			'condition' => ['type' => 'int', 'constraint' => 1],
			'add_info' => ['type' => 'varchar', 'constraint' => 255],
			'child' => ['type' => 'int', 'constraint' => 2],
			'weight' => ['type' => 'double'],
			'height' => ['type' => 'double'],
			'head' => ['type' => 'double'],
			'gender' => ['type' => 'int', 'constraint' => 1],
			'condition_1' => ['type' => 'int', 'constraint' => 1],
			'condition_2' => ['type' => 'int', 'constraint' => 1],
			'condition_3' => ['type' => 'int', 'constraint' => 1],
			'condition_4' => ['type' => 'int', 'constraint' => 1],
			'condition_5' => ['type' => 'int', 'constraint' => 1],
			'condition_6' => ['type' => 'int', 'constraint' => 1],
			'condition_7' => ['type' => 'int', 'constraint' => 1],
			'condition_8' => ['type' => 'int', 'constraint' => 1],
			'care_1' => ['type' => 'int', 'constraint' => 1],
			'care_2' => ['type' => 'int', 'constraint' => 1],
			'care_3' => ['type' => 'int', 'constraint' => 1],
			'care_4' => ['type' => 'int', 'constraint' => 1],
			'add_info2' => ['type' => 'varchar', 'constraint' => 255],
			'temp' => ['type' => 'double'],
			'ikterik' => ['type' => 'int', 'constraint' => 1],
			'navel' => ['type' => 'int', 'constraint' => 1],
			'feed' => ['type' => 'int', 'constraint' => 1],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'varchar', 'constraint' => 50],
			'examiner' => ['type' => 'varchar', 'constraint' => 255],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('baby_at_birth');
	}

	public function down()
	{
		$this->forge->dropForeignKey('baby_at_birth', 'baby_at_birth_patient_id_foreign');
		$this->forge->dropTable('baby_at_birth');
	}
}
