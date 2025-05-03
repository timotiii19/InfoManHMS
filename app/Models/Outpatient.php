<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outpatient extends Model
{
    use HasFactory;

    protected $primaryKey = 'OutpatientID';

    protected $fillable = [
        'PatientID',
        'VisitDate',
        'Diagnosis',
        'Treatment',
        'Doctor',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
    }
}
