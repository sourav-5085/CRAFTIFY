<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Craftify — Handcrafted, Reimagined</title>

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Custom CSS (Laravel Asset) -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

  <!-- Header Include -->
  @include('frontend.layouts.partials.header')

  <!-- Main Content Load Hobe -->
  <main>
    @yield('content')
  </main>

  <!-- Footer Include -->
  @include('frontend.layouts.partials.footer')

  <!-- Bootstrap & Custom JS -->
  <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Global SweetAlert Logic -->
  <script>
    @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: "{{ session('success') }}",
      timer: 3000,
      showConfirmButton: false,
      toast: true,
      position: 'top-end'
    });
    @endif

    @if(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: "{{ session('error') }}",
      confirmButtonColor: '#235d47'
    });
    @endif

    @if($errors -> any())
    Swal.fire({
      icon: 'error',
      title: 'Validation Error!',
      text: "{{ $errors->first() }}",
      confirmButtonColor: '#235d47'
    });
    @endif
  </script>
</body>

</html>