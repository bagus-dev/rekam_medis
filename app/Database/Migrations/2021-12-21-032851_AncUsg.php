<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AncUsg extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'husband' => ['type' => 'varchar', 'constraint' => 255],
			'mother' => ['type' => 'varchar', 'constraint' => 255],
			'address' => ['type' => 'varchar', 'constraint' => 255],
			'education' => ['type' => 'varchar', 'constraint' => 255],
			'job' => ['type' => 'varchar', 'constraint' => 255],
			'nik' => ['type' => 'varchar', 'constraint' => 255],
			'visit' => ['type' => 'char', 'constraint' => 1],
			'revisit' => ['type' => 'date'],
			'g' => ['type' => 'varchar', 'constraint' => 10],
			'p' => ['type' => 'varchar', 'constraint' => 10],
			'a' => ['type' => 'varchar', 'constraint' => 10],
			'hpht' => ['type' => 'date'],
			'tp' => ['type' => 'varchar', 'constraint' => 10],
			'gestational_age' => ['type' => 'int', 'constraint' => 2],
			'tb' => ['type' => 'int', 'constraint' => 5],
			'bb' => ['type' => 'int', 'constraint' => 5],
			'td' => ['type' => 'varchar', 'constraint' => 10],
			'lila' => ['type' => 'varchar', 'constraint' => 10],
			'tfu' => ['type' => 'varchar', 'constraint' => 50],
			'dii' => ['type' => 'varchar', 'constraint' => 10],
			'pres' => ['type' => 'varchar', 'constraint' => 10],
			'tt' => ['type' => 'varchar', 'constraint' => 10],
			'fe' => ['type' => 'int', 'constraint' => 1],
			'fetal_position' => ['type' => 'varchar', 'constraint' => 255],
			'fetal_heart_rate' => ['type' => 'varchar', 'constraint' => 255],
			'immunization' => ['type' => 'varchar', 'constraint' => 255],
			'blood_boost_tablets' => ['type' => 'varchar', 'constraint' => 255],
			'lab' => ['type' => 'varchar', 'constraint' => 100],
			'blood' => ['type' => 'int', 'constraint' => 1],
			'hb' => ['type' => 'int', 'constraint' => 2],
			'hiv' => ['type' => 'int', 'constraint' => 1],
			'hbsag' => ['type' => 'int', 'constraint' => 1],
			'sifilis' => ['type' => 'int', 'constraint' => 1],
			'urine' => ['type' => 'int', 'constraint' => 1],
			'glukosa' => ['type' => 'int', 'constraint' => 10],
			'ref' => ['type' => 'varchar', 'constraint' => 50],
			'diagnose' => ['type' => 'varchar', 'constraint' => 50],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'status' => ['type' => 'int', 'constraint' => 1],
			'governance' => ['type' => 'varchar', 'constraint' => 255],
			'counseling' => ['type' => 'varchar', 'constraint' => 255],
			'service_place' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'varchar', 'constraint' => 50],
			'examiner' => ['type' => 'varchar', 'constraint' => 255],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('anc_usg');
	}

	public function down()
	{
		$this->forge->dropForeignKey('anc_usg', 'anc_usg_patient_id_foreign');
		$this->forge->dropTable('anc_usg');
	}
}
