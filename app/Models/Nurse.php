<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    protected $primaryKey = 'NurseID';

    protected $fillable = [
        'Name', 'DepartmentID', 'Email', 'Availability', 'ContactNumber'
    ];

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }
}
