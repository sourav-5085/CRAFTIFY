<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - Craftify</title>
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
  <div class="card-custom bg-white">
    <h4 class="fw-bold mb-2 text-center">Create New Password</h4>
    <p class="text-muted small mb-4 text-center">We sent an OTP to <strong>{{ $email }}</strong></p>

    @if(session('error')) <div class="alert alert-danger small p-2">{{ session('error') }}</div> @endif
    @if(session('success')) <div class="alert alert-success small p-2">{{ session('success') }}</div> @endif
    @if($errors->any()) <div class="alert alert-danger small p-2">{{ $errors->first() }}</div> @endif

    <form action="{{ route('password.update') }}" method="POST">
      @csrf
      <input type="hidden" name="email" value="{{ $email }}">

      <div class="mb-3">
        <label class="form-label small fw-bold">Enter 6-Digit OTP</label>
        <input type="text" name="otp" class="form-control" maxlength="6" style="padding:12px; border-radius:10px; letter-spacing: 5px; text-align: center; font-weight: bold;" required>
      </div>
      <div class="mb-3">
        <label class="form-label small fw-bold">New Password</label>
        <input type="password" name="password" class="form-control" style="padding:12px; border-radius:10px;" required>
      </div>
      <div class="mb-4">
        <label class="form-label small fw-bold">Confirm New Password</label>
        <input type="password" name="password_confirmation" class="form-control" style="padding:12px; border-radius:10px;" required>
      </div>
      <button type="submit" class="btn btn-brand">Reset Password</button>
    </form>
  </div>
</body>

</html>