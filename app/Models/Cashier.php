<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $table = 'cashiers'; // Use the correct table name
    protected $primaryKey = 'CashierID'; // Adjust if necessary

    protected $fillable = [
        'name',
    ];
}
