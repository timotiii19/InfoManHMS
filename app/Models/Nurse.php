<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    protected $primaryKey = 'NurseID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Gender',
        'DateOfBirth',
        'Phone',
        'Email',
        'Address',
        'Department',
    ];
}
