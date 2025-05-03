<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedication extends Model
{
    use HasFactory;

    protected $primaryKey = 'MedicationID';

    protected $fillable = [
        'PatientID',
        'PharmacyID',
        'Dosage',
        'Frequency',
        'Duration',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'PharmacyID');
    }
}
