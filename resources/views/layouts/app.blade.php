<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Hospital Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 220px;
            background-color: #343a40;
            padding-top: 60px;
            transition: width 0.3s;
            overflow-x: hidden;
            z-index: 1000;
        }
        .sidebar.collapsed {
            width: 0;
        }
        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar.collapsed a {
            display: none;
        }
        .main-content {
            margin-left: 220px;
            transition: margin-left 0.3s;
            padding: 20px;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .dashboard-card {
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-3px);
        }
        .toggle-btn, .back-btn {
            position: fixed;
            top: 10px;
            z-index: 1001;
            background-color: #343a40;
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
            display: none; /* Hide by default */
            padding: 10px 5px;  /* Reduced padding */
            font-size: 14px;  /* Smaller font size */
            border-radius: 3px; /* Slightly smaller border-radius */
            height: 30px;  /* Adjust the height */
        }

        /* Hide section content by default */
        .section-content {
            display: none;
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
    // Sidebar toggle functionality
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
    });

    // Toggle visibility of section content on click
    document.querySelectorAll('.section-toggle').forEach(function (toggleButton) {
        toggleButton.addEventListener('click', function (event) {
            var sectionContent = toggleButton.nextElementSibling;

            // If section is hidden, show it; if visible, hide it
            if (sectionContent.style.display === "none" || sectionContent.style.display === "") {
                sectionContent.style.display = "block";  // Show the section content
            } else {
                sectionContent.style.display = "none";  // Hide the section content
            }

            // Prevent page scrolling when clicking sidebar links
            event.preventDefault();
        });
    });

    // Hide the "Back to Dashboard" button on the dashboard page
    window.addEventListener('DOMContentLoaded', (event) => {
        const backBtn = document.getElementById('backBtn');
        if (window.location.pathname === '/dashboard') {
            backBtn.style.display = 'none';  // Hide button on /dashboard
        } else {
            backBtn.style.display = 'inline-block';  // Show button on other pages
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
