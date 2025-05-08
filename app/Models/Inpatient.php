<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    use HasFactory;

    protected $primaryKey = 'InpatientID';

    protected $fillable = [
        'PatientID', 'DoctorID', 'DepartmentID', 'LocationID', 'Availability', 'MedicalRecord', 'AdmissionDate', 'DischargeDate', 'Diagnosis',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID'); // New relationship for Location
    }
}
