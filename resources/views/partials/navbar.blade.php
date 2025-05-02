<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">HospitalMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('patients.index') }}">Patients</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('doctors.index') }}">Doctors</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('nurses.index') }}">Nurses</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departments</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('locations.index') }}">Locations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('inpatients.index') }}">Inpatients</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('outpatients.index') }}">Outpatients</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('labprocedures.index') }}">Lab Procedures</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('emergencies.index') }}">Emergencies</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pharmacy.index') }}">Pharmacy</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('patient_medications.index') }}">Medications</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('billing.index') }}">Billing</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('visitors.index') }}">Visitors</a></li>
        </ul>

    </div>
  </div>
</nav>
