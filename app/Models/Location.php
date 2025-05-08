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

    /**
     * A location can be occupied by many patients.
     */
    public function patients()
    {
        return $this->hasMany(Patient::class, 'LocationID');
    }
}
