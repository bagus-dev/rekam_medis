<?php

namespace App\Models;

use CodeIgniter\Model;

class PartusModel extends Model
{
    protected $table = 'partus';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'weight', 'height', 'first_day', 'estimated_day', 'date', 'blood_group', 'contraceptive_use', 'disease_history', 'allergy_history', 'immunization', 'g', 'p', 'a', 'obstetric_p', 'obstetric_a', 'pregnancy', 'year', 'born', 'born_app', 'born_sso', 'birthing_place', 'condition', 'complication', 'child', 'weight_born', 'height_born', 'head_circ', 'gender', 'day', 'hecting', 'phone', 'description', 'refer', 'desc_refer', 'complaint', 'therapy', 'price', 'examiner', 'created_at', 'updated_at'];
}