<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'PatientID';

    protected $fillable = [
        'FirstName', 'LastName', 'Gender', 'DOB', 'Phone', 'Email', 'Address', 'LocationID',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID');
    }
}
