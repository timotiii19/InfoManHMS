<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'DoctorID';
    public $timestamps = false;

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

    // Relationships
    public function department() {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    public function location() {
        return $this->belongsTo(Location::class, 'LocationID');
    }
}
