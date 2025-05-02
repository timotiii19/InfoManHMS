<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    protected $table = 'inpatients';
    protected $primaryKey = 'InpatientID';
    public $timestamps = false;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'DepartmentID',
        'LocationID',
        'Availability',
        'MedicalRecord',
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

    public function location() {
        return $this->belongsTo(Location::class, 'LocationID');
    }
}
