<!DOCTYPE html>
<html>
<head>
  <title>Hospital System</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  @include('partials.navbar')
  <div class="container mt-4">
    @yield('content')
  </div>
</body>
</html>
