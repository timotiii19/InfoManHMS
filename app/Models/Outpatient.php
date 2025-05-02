<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outpatient extends Model
{
    protected $table = 'outpatients';
    protected $primaryKey = 'OutpatientID';
    public $timestamps = false;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'DepartmentID',
        'VisitDate',
        'Reason',
    ];

    // Relationships
    public function patient() {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }
}
