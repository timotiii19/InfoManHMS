<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\InpatientController;
use App\Http\Controllers\OutpatientController;
use App\Http\Controllers\LabProcedureController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\PatientMedicationController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\VisitorController;



// Redirect root to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// OR serve the view directly at root (and still keep the named dashboard)
Route::view('/', 'dashboard')->name('dashboard');


// Routes for each module
Route::resource('appointments', AppointmentController::class);
Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('nurses', NurseController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('locations', LocationController::class);
Route::resource('inpatients', InpatientController::class);
Route::resource('outpatients', OutpatientController::class);
Route::resource('labprocedures', LabProcedureController::class);
Route::resource('emergencies', EmergencyController::class);
Route::resource('pharmacy', PharmacyController::class);
Route::resource('patient_medications', PatientMedicationController::class);
Route::resource('billing', BillingController::class);
Route::resource('pharmacists', PharmacistController::class);
Route::resource('cashiers', CashierController::class);
Route::resource('visitors', VisitorController::class);

