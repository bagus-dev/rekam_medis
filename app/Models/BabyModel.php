<?php

namespace App\Models;

use CodeIgniter\Model;

class BabyModel extends Model
{
    protected $table = 'baby_at_birth';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'husband_name', 'datetime', 'gestational_age', 'birth_attendant', 'how', 'condition', 'add_info', 'child', 'weight', 'height', 'head', 'gender', 'condition_1', 'condition_2', 'condition_3', 'condition_4', 'condition_5', 'condition_6', 'condition_7', 'condition_8', 'care_1', 'care_2', 'care_3', 'care_4', 'add_info2', 'temp', 'ikterik', 'navel', 'feed', 'complaint', 'therapy', 'hbsag', 'price', 'examiner', 'created_at', 'updated_at'];
}