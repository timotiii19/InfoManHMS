<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'patient_billing';

    protected $fillable = [
        'patient_id',
        'amount',
        'description',
        'billing_date',
    ];
}
