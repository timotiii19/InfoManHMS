<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use Carbon\Carbon;


class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = 'DoctorID';

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


    public function schedule(Doctor $doctor)
    {
        $today = Carbon::today();

        $appointments = Appointment::whereDate('appointment_time', $today)
            ->where('DoctorID', $doctor->DoctorID)
            ->with('patient') // Make sure the relationship exists
            ->get();

        return view('doctors.schedule', compact('doctor', 'appointments'));
    }


    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'DoctorID');
    }

}
