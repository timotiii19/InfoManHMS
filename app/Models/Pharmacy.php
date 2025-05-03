<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $table = 'pharmacy'; // <-- specify table name manually

    protected $primaryKey = 'PharmacyID';

    protected $fillable = [
        'PharmacyName', 'Phone', 'Address',
    ];
}
