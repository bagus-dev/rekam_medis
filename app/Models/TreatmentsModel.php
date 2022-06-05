<?php

namespace App\Models;

use CodeIgniter\Model;

class TreatmentsModel extends Model
{
    protected $table = 'treatments';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'complaint', 'supporting_investigation', 'weight', 'body_temperature', 'tension', 'therapy', 'price', 'examiner', 'code', 'diagnose', 'complaints', 'created_at', 'updated_at'];
}