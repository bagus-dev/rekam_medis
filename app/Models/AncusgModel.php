<?php

namespace App\Models;

use CodeIgniter\Model;

class AncusgModel extends Model
{
    protected $table = 'anc_usg';
    protected $usetimestamps = true;
    protected $allowedFields = ['patient_id', 'husband', 'mother', 'address', 'education', 'job', 'nik', 'visit', 'revisit', 'g', 'p', 'a', 'hpht', 'tp', 'gestational_age', 'tb', 'bb', 'td', 'lila', 'tfu', 'dii', 'pres', 'tt', 'fe', 'fetal_position', 'fetal_heart_rate', 'immunization', 'blood_boost_tablets', 'lab', 'blood', 'hb', 'hiv', 'hbsag', 'sifilis', 'urine', 'glukosa', 'ref', 'diagnose', 'complaint', 'therapy', 'status', 'governance', 'counseling', 'service_place', 'price', 'examiner', 'created_at', 'updated_at'];
}