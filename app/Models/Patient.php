<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'PatientID';
    protected $fillable = [
        'Name',
        'DateOfBirth',
        'Sex',
        'Address',
        'ContactNumber',
        'PatientType',
        'LocationID',
    ];

    public function inpatient()
    {
        return $this->hasOne(Inpatient::class, 'PatientID');
    }

    public function outpatient()
    {
        return $this->hasOne(Outpatient::class, 'PatientID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'PatientID');
    }
}


