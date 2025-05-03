<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabProcedure extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProcedureID';

    protected $fillable = [
        'PatientID',
        'ProcedureType',
        'ProcedureDate',
        'Results',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
