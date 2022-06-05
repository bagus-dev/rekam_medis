<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Immunizations extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'date_of_birth' => ['type' => 'date'],
			'address' => ['type' => 'varchar', 'constraint' => 255],
			'weight' => ['type' => 'int', 'constraint' => 10],
			'body_temp' => ['type' => 'double'],
			'height' => ['type' => 'int', 'constraint' => 10],
			'parent_name' => ['type' => 'varchar', 'constraint' => 255],
			'bcg' => ['type' => 'int', 'constraint' => 1],
			'hb_neo' => ['type' => 'int', 'constraint' => 1],
			'hib_1' => ['type' => 'int', 'constraint' => 1],
			'hib_2' => ['type' => 'int', 'constraint' => 1],
			'hib_3' => ['type' => 'int', 'constraint' => 1],
			'polio_1' => ['type' => 'int', 'constraint' => 1],
			'polio_2' => ['type' => 'int', 'constraint' => 1],
			'polio_3' => ['type' => 'int', 'constraint' => 1],
			'polio_4' => ['type' => 'int', 'constraint' => 1],
			'campak' => ['type' => 'int', 'constraint' => 1],
			'booster' => ['type' => 'int', 'constraint' => 1],
			'polio_ipv' => ['type' => 'int', 'constraint' => 1],
			'supporting_investigation' => ['type' => 'varchar', 'constraint' => 100],
			'immune_type' => ['type' => 'varchar', 'constraint' => 100],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'int', 'constraint' => 8],
			'examiner' => ['type' => 'varchar', 'constraint' => 100],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('immunizations');
	}

	public function down()
	{
		$this->forge->dropForeignKey('immunizations', 'immunizations_patient_id_foreign');
		$this->forge->dropTable('immunizations');
	}
}
