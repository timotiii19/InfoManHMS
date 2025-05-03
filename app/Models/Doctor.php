<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = 'DoctorID';

    protected $fillable = [
        'DoctorName',
        'Email',
        'Availability',
        'ContactNumber',
        'DoctorType',
        'DepartmentID',
        'LocationID',
        'RoomType',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID');
    }
}
