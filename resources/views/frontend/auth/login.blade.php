<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Sign Up - Craftify</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f4f7f6;
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
    .auth-container {
      max-width: 900px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .auth-sidebar {
      background: linear-gradient(135deg, #143126 0%, #235d47 100%);
      color: white;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }
    .auth-form-area {
      padding: 40px;
    }
    .nav-pills .nav-link {
      color: #6c757d;
      border-radius: 30px;
      padding: 10px 25px;
      font-weight: 600;
    }
    .nav-pills .nav-link.active {
      background-color: #235d47;
      color: #fff;
    }
    .form-control {
      border-radius: 10px;
      padding: 12px 15px;
      border: 1px solid #dee2e6;
    }
    .form-control:focus {
      border-color: #235d47;
      box-shadow: 0 0 0 0.25rem rgba(35, 93, 71, 0.25);
    }
    .btn-brand {
      background-color: #235d47;
      color: white;
      border-radius: 10px;
      padding: 12px;
      font-weight: bold;
      width: 100%;
      border: none;
      transition: 0.3s;
    }
    .btn-brand:hover {
      background-color: #143126;
      color: white;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>

  <div class="container py-5">
    
    <!-- SweetAlert Session Logic -->
    @if(session('error') || session('success') || $errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if(session('error'))
                    Swal.fire({ icon: 'error', title: 'Oops...', text: "{{ session('error') }}" });
                @endif
                
                @if(session('success'))
                    Swal.fire({ icon: 'success', title: 'Success!', text: "{{ session('success') }}" });
                @endif
                
                @if($errors->any())
                    Swal.fire({ icon: 'error', title: 'Validation Error!', text: "{{ $errors->first() }}" });
                @endif
            });
        </script>
    @endif

    <div class="row g-0 auth-container mx-auto">
      
      <!-- Sidebar -->
      <div class="col-md-5 d-none d-md-flex auth-sidebar">
        <i class="bi bi-shop fs-1 mb-3"></i>
        <h2 class="fw-bold mb-3">Welcome to Craftify</h2>
        <p class="text-white-50">Join our community of premium vendors and happy customers.</p>
      </div>

      <!-- Form Area -->
      <div class="col-md-7 auth-form-area">
        
        <!-- Tabs -->
        <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab">Sign Up</button>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

          <!-- LOGIN FORM -->
          <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
            <h4 class="fw-bold mb-4 text-center">Login to your account</h4>
            <form action="{{ route('auth.login.submit') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter password">
              </div>
              <div class="mb-4">
                <label class="form-label text-muted small fw-bold">Login As</label>
                <select name="login_role" class="form-select" required style="border-radius: 10px; padding: 12px;">
                  <option value="customer">Customer</option>
                  <option value="vendor">Vendor</option>
                </select>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember">
                  <label class="form-check-label small" for="remember">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-decoration-none small" style="color: #235d47;">Forgot Password?</a>
              </div>
              <button type="submit" class="btn btn-brand">Sign In</button>
            </form>
          </div>

          <!-- REGISTER FORM -->
          <div class="tab-pane fade" id="pills-register" role="tabpanel">
            <h4 class="fw-bold mb-4 text-center">Create a new account</h4>
            <form action="{{ route('auth.register.submit') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Full Name</label>
                <input type="text" name="name" class="form-control" required placeholder="John Doe">
              </div>
              <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" required placeholder="john@example.com">
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label text-muted small fw-bold">Password</label>
                  <input type="password" name="password" class="form-control" required placeholder="Min. 8 chars">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label text-muted small fw-bold">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirm">
                </div>
              </div>
              <div class="mb-4">
                <label class="form-label text-muted small fw-bold">Join As</label>
                <select name="register_role" class="form-select" required style="border-radius: 10px; padding: 12px;">
                  <option value="customer">Customer</option>
                  <option value="vendor">Vendor</option>
                </select>
              </div>
              <button type="submit" class="btn btn-brand">Create Account</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>