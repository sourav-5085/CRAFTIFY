<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Craftify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Background mimicking a website behind a blur */
        body {
            background-image: url('https://source.unsplash.com/random/1920x1080/?ecommerce,shopping'); /* Ektu e-commerce feel */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
        }

        /* Overlay for the blur effect */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.6); /* Sada transparent background */
            backdrop-filter: blur(10px); /* Blur effect */
            z-index: 1;
        }

        /* Modal/Popup Container */
        .otp-modal {
            position: relative;
            z-index: 2;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            text-align: center;
            animation: slideUp 0.5s ease-out forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #e6f4ea;
            color: #235d47;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
        }

        .form-control-otp {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px;
            font-size: 24px;
            letter-spacing: 10px;
            text-align: center;
            font-weight: bold;
            color: #333;
            transition: all 0.3s;
        }

        .form-control-otp:focus {
            border-color: #235d47;
            box-shadow: 0 0 0 0.25rem rgba(35, 93, 71, 0.25);
            outline: none;
        }

        .btn-verify {
            background-color: #235d47;
            color: white;
            border-radius: 12px;
            padding: 14px;
            font-weight: bold;
            width: 100%;
            border: none;
            transition: 0.3s;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-verify:hover {
            background-color: #143126;
            transform: translateY(-2px);
        }

        .resend-link {
            color: #235d47;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .resend-link:hover {
            text-decoration: underline;
            color: #143126;
        }
    </style>
</head>
<body>

    <div class="overlay"></div>

    <div class="otp-modal">
        <div class="icon-circle">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        
        <h3 class="fw-bold mb-2">Verify Your Account</h3>
        <p class="text-muted small mb-4">
            We've sent a 6-digit verification code to<br>
            <strong>{{ session('verify_email') ?? 'your email address' }}</strong>
        </p>

        <!-- SweetAlert Include for Errors -->
        @if(session('error') || $errors->any())
            <div class="alert alert-danger small p-2 mb-3 text-start">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') ?? $errors->first() }}
            </div>
        @endif

        <!-- The Form -->
        <form action="{{ route('auth.otp.submit') }}" method="POST">
            @csrf
            <!-- Hidden field for email -->
            <input type="hidden" name="email" value="{{ session('verify_email') }}">
            
            <div class="mb-4">
                <input type="text" name="otp" class="form-control form-control-otp" placeholder="------" maxlength="6" required autocomplete="off" autofocus>
            </div>
            
            <button type="submit" class="btn btn-verify">
                Verify & Continue <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </form>

        <div class="mt-4 small text-muted">
            Didn't receive the code?<br>
            <!-- Resend functionality ar ekta alada route lagbe jodi add korte chao -->
            <a href="#" class="resend-link mt-1 d-inline-block">Resend OTP</a>
        </div>
    </div>

    <!-- Optional: SweetAlert via script as fallback -->
    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}"
            });
        </script>
    @endif

</body>
</html>