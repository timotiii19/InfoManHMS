<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientMedication extends Model
{
    protected $table = 'patient_medications';
    protected $primaryKey = 'PatientMedicationID';
    public $timestamps = false; // if your table doesn't have created_at/updated_at

    protected $fillable = [
        'patient_id',
        'medicine_id',
        'doctor_id',
        'dosage',
        'frequency',
        'StartDate',
        'EndDate',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Pharmacy::class, 'medicine_id', 'MedicineID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
