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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'outpatientCount' => Outpatient::count(),
        'inpatientCount' => Inpatient::count(),
        'employeeCount' => Doctor::count() + Nurse::count(),
        'pharmaceuticalCount' => Pharmacist::count(),
        'patients' => Patient::all()
    ]);
});


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