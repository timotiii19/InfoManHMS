<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'PatientID';

    protected $fillable = [
        'Name', 'DateOfBirth', 'Sex', 'Address', 'ContactNumber', 'PatientType'
    ];

    // Optional: Add relationships, for example, for a patient having many appointments or medications
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'PatientID');
    }

    public function inpatientRecords()
    {
        return $this->hasMany(Inpatient::class, 'PatientID');
    }

    public function outpatientRecords()
    {
        return $this->hasMany(Outpatient::class, 'PatientID');
    }
}
