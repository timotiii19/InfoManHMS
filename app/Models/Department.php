<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments'; // Optional if you follow Laravel naming conventions

    protected $fillable = [
        'DepartmentName',
        'DepartmentRoom',
    ];
}
