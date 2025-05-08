<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'patient_billing';

    protected $fillable = [
        'PatientID',
        'DoctorFee',
        'MedicineCost',
        'PaymentDate',
        'Receipt',
    ];

    // Relationship to Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
