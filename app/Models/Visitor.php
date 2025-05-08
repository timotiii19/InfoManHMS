<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if you follow Laravel's convention)
    protected $table = 'visitors';

    // Specify the fillable attributes (columns you can mass assign)
    protected $fillable = [
        'PatientID',
        'VisitorName',
        'Relationship',
        'VisitDateTime',
        'LocationID',
        'ContactNumber',
    ];

    // Define the relationships
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID');
    }
}
