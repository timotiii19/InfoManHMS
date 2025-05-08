<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'EmployeeID';

    protected $fillable = [
        'Name',
        'Email',
        'ContactNumber',
        'EmployeeType',
        'DepartmentID',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

}
