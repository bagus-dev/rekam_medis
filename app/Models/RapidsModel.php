<?php

namespace App\Models;

use CodeIgniter\Model;

class RapidsModel extends Model
{
    protected $table = 'rapids';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'supporting_investigation', 'rapid_type', 'result', 'complaint', 'therapy', 'price', 'examiner', 'created_at', 'updated_at'];
}