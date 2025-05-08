<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'outpatients';

    // The primary key of the table
    protected $primaryKey = 'OutpatientID';

    // The attributes that are mass assignable
    protected $fillable = [
        'PatientID',
        'DoctorID',
        'DepartmentID',
        'VisitDate',
        'Reason',
    ];

    // Define relationships with other models
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
}
