<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = 'patient_biling'; // If the table name is different
    protected $primaryKey = 'BillingID';

    protected $fillable = [
        'patient_id', 'doctor_fee', 'medicine_cost', 'total_amount', 'payment_date', 'receipt'
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
