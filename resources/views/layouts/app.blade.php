<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Hospital Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* light gray background */
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 240px;
            background-color: #ffffff; /* white sidebar */
            border-right: 1px solid #dee2e6;
            padding-top: 60px;
            transition: width 0.3s;
            overflow-x: hidden;
            z-index: 1000;
        }
        .sidebar.collapsed {
            width: 0;
        }
        .sidebar a {
            color: #0d6efd; /* blue links */
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s, padding-left 0.2s, color 0.2s;
        }
        .sidebar a:hover {
            background-color: #e7f1ff;
            padding-left: 30px;
            color: #084298; /* darker blue on hover */
        }
        .sidebar.collapsed a {
            display: none;
        }
        .main-content {
            margin-left: 240px;
            transition: margin-left 0.3s;
            padding: 20px;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            background-color: #ffffff;
            border-left: 4px solid #0d6efd;
        }
        .dashboard-card:hover {
            transform: translateY(-3px);
        }
        .dashboard-card h5 {
            color: #0d6efd;
        }
        .toggle-btn, .back-btn {
            position: fixed;
            top: 10px;
            z-index: 1001;
            background-color: #0d6efd;
            border: none;
            color: white;
            padding: 8px 12px;
            font-size: 18px;
            border-radius: 4px;
        }
        .toggle-btn {
            left: 10px;
        }
        .back-btn {
            left: 70px;
            display: none;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 4px;
        }
        .section-content {
            display: none;
        }
        .section-toggle::after {
            content: " ▸";
            float: right;
        }
        .section-content.show {
            display: block;
        }
        .section-toggle.active::after {
            content: " ▾";
        }
        table {
            background-color: #ffffff;
        }
        thead {
            background-color: #0d6efd;
            color: white;
        }
        tbody tr:hover {
            background-color: #e7f1ff;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

<!-- Toggle button -->
<button class="toggle-btn" id="toggleBtn">☰</button>

<!-- Back to Dashboard button -->
<button class="back-btn" id="backBtn" onclick="window.location.href='/dashboard';">Back to Dashboard</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    @php
        $sections = [
            'Appointments' => ['Add Appointment' => route('appointments.create'), 'Display Appointments' => route('appointments.index')],
            'Billings' => ['Add Billing' => route('billings.create'), 'Display Billings' => route('billings.index')],
            'Cashiers' => ['Add Cashier' => route('cashiers.create'), 'Display Cashiers' => route('cashiers.index')],
            'Departments' => ['Add Department' => route('department.create'), 'Display Departments' => route('department.index')],
            'Doctors' => ['Add Doctor' => route('doctors.create'), 'Display Doctors' => route('doctors.index')],
            'Emergencies' => ['Add Emergency' => route('emergencies.create'), 'Display Emergencies' => route('emergencies.index')],
            'Inpatients' => ['Add Inpatient' => route('inpatients.create'), 'Display Inpatients' => route('inpatients.index')],
            'Lab Procedures' => ['Add Lab Procedure' => route('labprocedures.create'), 'Display Lab Procedures' => route('labprocedures.index')],
            'Locations' => ['Add Location' => route('locations.create'), 'Display Locations' => route('locations.index')],
            'Nurses' => ['Add Nurse' => route('nurses.create'), 'Display Nurses' => route('nurses.index')],
            'Outpatients' => ['Add Outpatient' => route('outpatients.create'), 'Display Outpatients' => route('outpatients.index')],
            'Patient Medications' => ['Add Medication' => route('patient_medications.create'), 'Display Medications' => route('patient_medications.index')],
            'Patients' => ['Add Patient' => route('patients.create'), 'Display Patients' => route('patients.index')],
            'Pharmacists' => ['Add Pharmacist' => route('pharmacists.create'), 'Display Pharmacists' => route('pharmacists.index')],
            'Pharmacy' => ['Add Pharmacy Item' => route('pharmacy.create'), 'Display Pharmacy Items' => route('pharmacy.index')],
            'Visitors' => ['Add Visitor' => route('visitors.create'), 'Display Visitors' => route('visitors.index')]
        ];
    @endphp

    @foreach($sections as $section => $actions)
        <a href="javascript:void(0);" class="section-toggle">
            {{ $section }}
        </a>
        <div class="ps-3 section-content" id="collapse{{ Str::slug($section) }}">
            @foreach($actions as $action => $url)
                <a href="{{ $url }}" class="small d-block">{{ $action }}</a>
            @endforeach
        </div>
    @endforeach
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    @yield('content')
</div>

<script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const backBtn = document.getElementById('backBtn');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
    });

    document.querySelectorAll('.section-toggle').forEach(function (toggleButton) {
        toggleButton.addEventListener('click', function (event) {
            var sectionContent = toggleButton.nextElementSibling;
            toggleButton.classList.toggle('active');
            sectionContent.classList.toggle('show');
            event.preventDefault();
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        if (window.location.pathname === '/dashboard') {
            backBtn.style.display = 'none';
        } else {
            backBtn.style.display = 'inline-block';
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
