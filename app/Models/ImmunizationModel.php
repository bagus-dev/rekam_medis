<?php

namespace App\Models;

use CodeIgniter\Model;

class ImmunizationModel extends Model
{
    protected $table = 'immunizations';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'date_of_birth', 'address', 'weight', 'body_temp', 'height', 'parent_name', 'bcg', 'hb_neo', 'hib_1', 'hib_2', 'hib_3', 'polio_1', 'polio_2', 'polio_3', 'polio_4', 'campak', 'booster', 'polio_ipv', 'supporting_investigation', 'immune_type', 'complaint', 'therapy', 'price', 'examiner', 'created_at', 'updated_at'];
}