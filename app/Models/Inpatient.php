<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    use HasFactory;

    protected $primaryKey = 'InpatientID';

    protected $fillable = [
        'PatientID',
        'AdmissionDate',
        'DischargeDate',
        'Diagnosis',
        'Treatment',
        'Doctor',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
    }
}
