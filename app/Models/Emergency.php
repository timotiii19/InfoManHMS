<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    protected $table = 'emergencies';

    protected $fillable = [
        'PatientID', 
        'NurseID', 
        'DoctorID', 
        'DateTime', 
        'EmergencyType'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'NurseID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}
