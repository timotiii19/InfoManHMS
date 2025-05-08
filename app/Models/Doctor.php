<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use Carbon\Carbon;

class Doctor extends Model
{
    use HasFactory;

    // Set the primary key for the model
    protected $primaryKey = 'DoctorID';

    // Define which attributes are mass assignable
    protected $fillable = [
        'DoctorName',
        'Email',
        'Availability',
        'ContactNumber',
        'DoctorType',
        'DepartmentID',
        'LocationID',
        'RoomType',
    ];

    // Method to get the doctor's schedule for today
    public function schedule()
    {
        $today = Carbon::today();

        // Get today's appointments for the doctor
        $appointments = Appointment::whereDate('appointment_time', $today)
            ->where('DoctorID', $this->DoctorID)
            ->with('patient') // Assuming a relationship with the patient
            ->get();

        return view('doctors.schedule', compact('appointments'));
    }

    // Relationship with Department model
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    // Relationship with Location model
    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID');
    }

    // Relationship with Appointment model (one-to-many)
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'DoctorID');
    }
}
