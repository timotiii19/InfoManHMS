@extends('layouts.app')

@section('title', 'Hospital Dashboard')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-card {
            background-color: #ffffff;
            border-left: 4px solid #0d6efd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .dashboard-card h5 {
            color: #0d6efd;
        }
        .table thead {
            background-color: #0d6efd;
            color: #fff;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
    </style>

    <h2 class="mb-4 text-center text-primary">Hospital Management System Dashboard</h2>

    <!-- Overview Cards -->
    <div class="row g-4">
        @php
            $cards = [
                'Patients' => $patientsCount,
                'Inpatients' => $inpatientsCount,
                'Outpatients' => $outpatientsCount,
                'Hospital Employees' => $employeesCount,
                'Pharmaceuticals' => $pharmacyCount,
                'Visitors' => $visitorsCount,
                'Lab Procedures' => $labProceduresCount,
                'Appointments' => $appointmentsCount,
                'Departments' => $departmentsCount,
            ];
        @endphp

        @foreach($cards as $card => $count)
            <div class="col-md-4">
                <div class="card dashboard-card p-3">
                    <h5>{{ $card }}</h5>
                    <p class="card-text">{{ $count }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Employee Table -->
    <div class="mt-5">
        <h4 class="text-primary">Hospital Employees</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td><img src="https://via.placeholder.com/40" class="rounded-circle"></td>
                        <td>{{ $employee->Name }}</td>
                        <td>{{ $employee->Email }}</td>
                        <td>{{ optional($employee->department)->DepartmentName ?? '-' }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->EmployeeID) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No employees found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
