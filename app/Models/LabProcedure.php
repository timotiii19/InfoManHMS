<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabProcedure extends Model
{
    protected $table = 'lab_procedures';
    protected $primaryKey = 'LabProcedureID';
    public $timestamps = false;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'TestDate',
        'Result',
        'DateReleased',
    ];

    // Relationships
    public function patient() {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}

