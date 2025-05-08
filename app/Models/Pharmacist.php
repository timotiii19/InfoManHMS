<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if you follow Laravel's convention)
    protected $table = 'pharmacists';

    // Specify the fillable attributes (columns you can mass assign)
    protected $fillable = [
        'Name',
        'ContactNumber',
    ];

    // Define the relationship with the Pharmacy model
    public function pharmacies()
    {
        return $this->hasMany(Pharmacy::class, 'PharmacistID');
    }
}
