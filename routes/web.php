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
use App\Http\Controllers\EmployeeController;


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
use App\Models\Employee;

Route::get('/dashboard', function () {
    // Fetch data directly in the route
    $patientsCount = Patient::count();
    $inpatientsCount = Inpatient::count();
    $outpatientsCount = Outpatient::count();
    $employeesCount = Employee::count(); // Ensure you have an Employee model
    $pharmacyCount = Pharmacy::count(); // Ensure you have a Pharmaceutical model
    $visitorsCount = Visitor::count(); // Ensure you have a Visitor model
    $labProceduresCount = LabProcedure::count(); // Ensure you have a LabProcedure model
    $appointmentsCount = Appointment::count(); // Ensure you have an Appointment model
    $departmentsCount = Department::count();

    // Fetch employees for the employee table
    $employees = Employee::all();

    // Return the dashboard view with the data
    return view('dashboard', compact(
        'patientsCount',
        'inpatientsCount',
        'outpatientsCount',
        'employeesCount',
        'pharmacyCount',
        'visitorsCount',
        'labProceduresCount',
        'appointmentsCount',
        'departmentsCount',
        'employees'
    ));
})->name('dashboard');


Route::get('patients/admit', [PatientController::class, 'admit'])->name('patients.admit');
Route::post('patients/store', [PatientController::class, 'store'])->name('patients.store');

Route::get('inpatients/create/{patientId}', [InpatientController::class, 'create'])->name('inpatients.create');
Route::post('inpatients/store', [InpatientController::class, 'store'])->name('inpatients.store');

Route::get('outpatients/create/{patientId}', [OutpatientController::class, 'create'])->name('outpatients.create');
Route::post('outpatients/store', [OutpatientController::class, 'store'])->name('outpatients.store');


Route::post('patients/{patientId}/assign-inpatient', [PatientController::class, 'assignInpatient'])->name('patients.assignInpatient');
Route::post('patients/{patientId}/assign-outpatient', [PatientController::class, 'assignOutpatient'])->name('patients.assignOutpatient');

Route::get('patients/{patient}/assign', [PatientController::class, 'assign'])->name('patients.assign');
Route::post('patients/{patient}/store-assignment', [PatientController::class, 'storeAssignment'])->name('patients.storeAssignment');
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
Route::resource('employees', EmployeeController::class);
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
