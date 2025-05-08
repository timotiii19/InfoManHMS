<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'LocationID';
    protected $fillable = [
        'RoomType', 'RoomCapacity', 'Availability', 'Building', 'Floor', 'RoomNumber',
    ];
}
