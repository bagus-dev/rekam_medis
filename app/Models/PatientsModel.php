<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $usetimestamps = true;
    protected $allowedFields = ['name', 'place_of_birth', 'date_of_birth', 'address', 'age', 'head_of_family', 'number_family_card', 'created_at', 'updated_at'];
}