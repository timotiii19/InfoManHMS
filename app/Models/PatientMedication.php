<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedication extends Model
{
    use HasFactory;

    protected $primaryKey = 'PatientMedicationID';

    protected $fillable = [
        'PatientID', 'MedicineID', 'DoctorID', 'Dosage', 'Frequency', 'StartDate', 'EndDate'
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    // Relationship with Medicine
    public function medicine()
    {
        return $this->belongsTo(Pharmacy::class, 'MedicineID');
    }

    // Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}
