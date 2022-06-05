<?php

namespace App\Models;

use CodeIgniter\Model;

class FamilyPlanningsModel extends Model
{
    protected $table = 'family_plannings';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'type', 'number_of_children', 'last_child_age', 'supporting_investigation', 'revisit', 'weight', 'blood', 'description', 'complaint', 'therapy', 'price', 'examiner', 'created_at', 'updated_at'];
}