<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'patient_billing';

    protected $primaryKey = 'BillingID';

    protected $fillable = [
        'PatientID',
        'BillingDate',
        'Amount',
        'Status',
        'Description',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
