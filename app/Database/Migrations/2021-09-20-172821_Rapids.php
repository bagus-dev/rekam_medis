<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rapids extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'patient_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'supporting_investigation' => ['type' => 'varchar', 'constraint' => 100],
			'rapid_type' => ['type' => 'varchar', 'constraint' => 100],
			'result' => ['type' => 'varchar', 'constraint' => 100],
			'complaint' => ['type' => 'varchar', 'constraint' => 255],
			'therapy' => ['type' => 'varchar', 'constraint' => 255],
			'price' => ['type' => 'int', 'constraint' => 8],
			'examiner' => ['type' => 'varchar', 'constraint' => 100],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'id', '', 'CASCADE');
		$this->forge->createTable('rapids');
	}

	public function down()
	{
		$this->forge->dropForeignKey('rapids', 'rapids_patient_id_foreign');
		$this->forge->dropTable('rapids');
	}
}
