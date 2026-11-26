<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password - Craftify</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8fafc;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-custom {
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: none;
      padding: 40px;
      max-width: 450px;
      width: 100%;
    }

    .btn-brand {
      background: #235d47;
      color: white;
      border-radius: 10px;
      padding: 12px;
      width: 100%;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="card-custom bg-white text-center">
    <h4 class="fw-bold mb-3">Forgot Password?</h4>
    <p class="text-muted small mb-4">Enter your registered email address to receive a 6-digit password reset code.</p>

    <!-- Error Handle -->
    @if($errors->any()) <div class="alert alert-danger small p-2">{{ $errors->first() }}</div> @endif

    <form action="{{ route('password.email') }}" method="POST">
      @csrf
      <div class="mb-4 text-start">
        <label class="form-label small fw-bold">Email Address</label>
        <input type="email" name="email" class="form-control" style="padding:12px; border-radius:10px;" required>
      </div>
      <button type="submit" class="btn btn-brand mb-3">Send OTP Code</button>
      <a href="{{ route('login') }}" class="text-decoration-none small" style="color: #235d47;">
        < Back to Login</a>
    </form>
  </div>
</body>

</html>