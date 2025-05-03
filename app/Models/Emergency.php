<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    protected $primaryKey = 'EmergencyID';

    protected $fillable = [
        'PatientID',
        'Condition',
        'ArrivalTime',
        'ActionsTaken',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
