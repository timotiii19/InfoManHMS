<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $primaryKey = 'VisitorID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'PhoneNumber',
        'VisitDate',
        'VisitTime',
        'PatientID',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
