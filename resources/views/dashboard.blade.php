@extends('layouts.app')

@section('title', 'Hospital Dashboard')

@section('content')
    <h2 class="mb-4 text-center">Hospital Management System Dashboard</h2>

    <!-- Overview Cards -->
    <div class="row g-4">
        <!-- Patients Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Patients</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Inpatients Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Inpatients</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Outpatients Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Outpatients</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Hospital Employees Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Hospital Employees</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Pharmaceuticals Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Pharmaceuticals</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Visitors Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Visitors</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Lab Procedures Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Lab Procedures</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Appointments Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Appointments</h5>
                <p class="card-text">0</p>
            </div>
        </div>

        <!-- Departments Card -->
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Departments</h5>
                <p class="card-text">0</p>
            </div>
        </div>
    </div>

    <!-- Table Example -->
    <div class="mt-5">
        <h4>Hospital Employees</h4>
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><img src="https://via.placeholder.com/40" class="rounded-circle"></td>
                <td>Jessica Spencer</td>
                <td>jessica@mail.com</td>
                <td>Accounting</td>
                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/40" class="rounded-circle"></td>
                <td>Aletha White</td>
                <td>aletha@mail.com</td>
                <td>Laboratory</td>
                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
