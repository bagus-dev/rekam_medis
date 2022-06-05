<?php

namespace App\Models;

use CodeIgniter\Model;

class RefModel extends Model
{
    protected $table = 'reference';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'husband', 'datetime', 'ref_to', 'cause', 'diagnose', 'act', 'who', 'created_at', 'updated_at'];
}