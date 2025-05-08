<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabProcedure extends Model
{
    use HasFactory;

    protected $primaryKey = 'LabProcedureID';
    protected $fillable = [
        'PatientID', 'DoctorID', 'TestDate', 'Result', 'DateReleased',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}
