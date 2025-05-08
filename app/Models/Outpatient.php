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
        'DoctorID',
        'DepartmentID',
        'VisitDate',
        'Reason',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }


    // Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }
}
