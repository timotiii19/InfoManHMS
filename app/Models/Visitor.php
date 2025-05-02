<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_name',
        'relation_to_patient',
        'patient_id',
        'visit_time',
        'purpose',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
