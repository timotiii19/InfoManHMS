<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\InpatientController;
use App\Http\Controllers\LabProcedureController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\OutpatientController;
use App\Http\Controllers\PatientMedicationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;

use App\Models\Outpatient;
use App\Models\Inpatient;
use App\Models\Pharmacist;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Visitor;
use App\Models\Appointment;
use App\Models\LabProcedure;
use App\Models\Department;
use App\Models\Pharmacy;

Route::get('/dashboard', function () {
    return view('dashboard', [
        'outpatientCount' => Outpatient::count(),
        'inpatientCount' => Inpatient::count(),
        'employeeCount' => Doctor::count() + Nurse::count(),
        'pharmaceuticalCount' => Pharmacy::count(),
        'visitorCount' => Visitor::count(),
        'labProcedureCount' => LabProcedure::count(),
        'appointmentCount' => Appointment::count(),
        'departmentCount' => Department::count(),
        'patients' => Patient::all()
    ]);
});

Route::get('/doctors/{doctor}/schedule', [DoctorController::class, 'schedule'])->name('doctors.schedule');
Route::get('patients/admit', [PatientController::class, 'admit'])->name('patients.admit');
Route::post('patients/admit', [PatientController::class, 'store'])->name('patients.store');

// Resource routes for each table (folder)
Route::resource('appointments', AppointmentController::class);
Route::resource('billings', BillingController::class);
Route::resource('cashiers', CashierController::class);
Route::resource('department', DepartmentController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('emergencies', EmergencyController::class);
Route::resource('inpatients', InpatientController::class);
Route::resource('labprocedures', LabProcedureController::class);
Route::resource('locations', LocationController::class);
Route::resource('nurses', NurseController::class);
Route::resource('outpatients', OutpatientController::class);
Route::resource('patient_medications', PatientMedicationController::class);
Route::resource('patients', PatientController::class);
Route::resource('pharmacists', PharmacistController::class);
Route::resource('pharmacy', PharmacyController::class);
Route::resource('profile', ProfileController::class);
Route::resource('visitors', VisitorController::class);
