<?php

namespace App\Models;

use CodeIgniter\Model;

class PostMotherModel extends Model
{
    protected $table = 'postpartum_mother';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'husband', 'visit', 'condition', 'td', 'body_temp', 'respiration', 'pulse', 'bleeding', 'perineum', 'infection', 'uteri', 'tfu', 'lokhia', 'inspection', 'breast', 'asi', 'capsule', 'contraception', 'handling', 'bab', 'bak', 'complaint', 'therapy', 'price', 'examiner', 'created_at', 'updated_at'];
}