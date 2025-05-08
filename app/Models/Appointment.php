<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Specify the primary key field (if not using default 'id')
    protected $primaryKey = 'AppointmentID';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'PatientID', 
        'DoctorID', 
        'AppointmentDate', 
        'Reason'
    ];

    // Define the relationship to the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    // Define the relationship to the Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}
