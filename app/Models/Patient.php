<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
        protected $primaryKey = 'PatientID';
        public $timestamps = false; // if your table doesn’t have created_at/updated_at

    protected $fillable = [
        'Name',
        'DateOfBirth',
        'Sex',
        'Address',
        'ContactNumber',
        'PatientType',
    ];

    // Relationships (if needed)
    public function inpatients() {
        return $this->hasMany(Inpatient::class, 'PatientID');
    }

    public function outpatients() {
        return $this->hasMany(Outpatient::class, 'PatientID');
    }
}
