<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    protected $table = 'pharmacists'; // Use the correct table name
    protected $primaryKey = 'PharmacistID'; // Adjust the primary key if needed

    protected $fillable = [
        'name', 'contact_number',
    ];
}
