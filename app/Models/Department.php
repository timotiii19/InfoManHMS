<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    // Tell Laravel the PK column
    protected $primaryKey = 'DepartmentID';

    // If you don’t have created_at/updated_at columns
    public $timestamps = false;

    protected $fillable = [
        'DepartmentName',
        'DepartmentRoom',
    ];
}
