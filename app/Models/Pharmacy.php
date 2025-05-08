<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if you follow Laravel's convention)
    protected $table = 'pharmacies';

    // Specify the fillable attributes (columns you can mass assign)
    protected $fillable = [
        'PharmacistID',
        'Description',
        'StockQuantity',
        'Price',
    ];

    // Define the relationship with the Pharmacist model
    public function pharmacist()
    {
        return $this->belongsTo(Pharmacist::class, 'PharmacistID');
    }
}
