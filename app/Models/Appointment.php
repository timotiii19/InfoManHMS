<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $primaryKey = 'AppointmentID';

    protected $fillable = [
        'patient_id', 'doctor_id', 'appointment_date', 'appointment_time', 'status', 'notes'
    ];

    public function patient() { return $this->belongsTo(Patient::class, 'patient_id', 'PatientID'); }
    public function doctor()  { return $this->belongsTo(Doctor::class, 'doctor_id', 'DoctorID'); }
    
}
