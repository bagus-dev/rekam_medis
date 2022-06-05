<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostpartumMother extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'husband' => ['type' => 'varchar', 'constraint' => 255],
			'visit' => ['type' => 'int', 'constraint' => 1],
			'condition' => ['type' => 'int', 'constraint' => 1],
			'td' => ['type' => 'varchar', 'constraint' => 10],
			'body_temp' => ['type' => 'double'],
			'respiration' => ['type' => 'varchar', 'constraint' => 255],
			'pulse' => ['type' => 'varchar', 'constraint' => 255],
			'bleeding' => ['type' => 'int', 'constraint' => 1],
			'perineum' => ['type' => 'int', 'constraint' => 1],
			'infection' => ['type' => 'int', 'constraint' => 1],
			'uteri' => ['type' => 'int', 'constraint' => 1],
			'tfu' => ['type' => 'varchar', 'constraint' => 50],
			'lokhia' => ['type' => 'int', 'constraint' => 1],
			'inspection' => ['type' => 'varchar', 'constraint' => 255],
			'breast' => ['type' => 'varchar', 'constraint' => 255],
			'asi' => ['type' => 'int', 'constraint' => 1],
			'capsule' => ['type' => 'int', 'constraint' => 1],
			'contraception' => ['type' => 'varchar', 'constraint' => 255],
			'handling' => ['type' => 'varchar', 'constraint' => 255],
			'bab' => ['type' => 'int', 'constraint' => 1],
			'bak' => ['type' => 'int', 'constraint' => 1],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'varchar', 'constraint' => 50],
			'examiner' => ['type' => 'varchar', 'constraint' => 255],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('postpartum_mother');
	}

	public function down()
	{
		$this->forge->dropForeignKey('postpartum_mother', 'postpartum_mother_patient_id_foreign');
		$this->forge->dropTable('postpartum_mother');
	}
}
