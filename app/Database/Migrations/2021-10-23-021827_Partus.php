<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Partus extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'weight' => ['type' => 'double'],
			'height' => ['type' => 'double'],
			'first_day' => ['type' => 'date'],
			'estimated_day' => ['type' => 'date'],
			'date' => ['type' => 'datetime'],
			'blood_group' => ['type' => 'int', 'constraint' => 1],
			'contraceptive_use' => ['type' => 'varchar', 'constraint' => 20],
			'disease_history' => ['type' => 'varchar', 'constraint' => 50],
			'allergy_history' => ['type' => 'varchar', 'constraint' => 50],
			'immunization' => ['type' => 'varchar', 'constraint' => 50],
			'g' => ['type' => 'varchar', 'constraint' => 255],
			'p' => ['type' => 'varchar', 'constraint' => 255],
			'a' => ['type' => 'varchar', 'constraint' => 255],
			'obstetric_p' => ['type' => 'int', 'constraint' => 2],
			'obstetric_a' => ['type' => 'int', 'constraint' => 2],
			'pregnancy' => ['type' => 'int', 'constraint' => 2],
			'year' => ['type' => 'year'],
			'born' => ['type' => 'int', 'constraint' => 1],
			'born_app' => ['type' => 'int', 'constraint' => 1],
			'born_sso' => ['type' => 'int', 'constraint' => 1],
			'birthing_place' => ['type' => 'varchar', 'constraint' => 100],
			'condition' => ['type' => 'varchar', 'constraint' => 100],
			'complication' => ['type' => 'int', 'constraint' => 1],
			'child' => ['type' => 'varchar', 'constraint' => 5],
			'weight_born' => ['type' => 'double'],
			'height_born' => ['type' => 'double'],
			'head_circ' => ['type' => 'double'],
			'gender' => ['type' => 'int', 'constraint' => 1],
			'day' => ['type' => 'varchar', 'constraint' => 9],
			'hecting' => ['type' => 'int', 'constraint' => 1],
			'phone' => ['type' => 'varchar', 'constraint' => 13],
			'description' => ['type' => 'varchar', 'constraint' => 255],
			'refer' => ['type' => 'int', 'constraint' => 1],
			'desc_refer' => ['type' => 'varchar', 'constraint' => 255],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'varchar', 'constraint' => 50],
			'examiner' => ['type' => 'varchar', 'constraint' => 255],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('partus');
	}

	public function down()
	{
		$this->forge->dropForeignKey('partus', 'partus_patient_id_foreign');
		$this->forge->dropTable('partus');
	}
}
