<header class="navbar-glass">
  <div class="container-wide d-flex align-items-center justify-content-between gap-3">
    <a href="#" class="brand-mark">
      <img src="{{ asset('frontend/images/logo.png') }}" alt="Craftify Logo" style="width: 160px; object-fit: contain;">
    </a>

    <nav class=" nav-links d-none d-lg-flex">
      <a href="#hero">Home</a>
      <a href="#showcase">Shop</a>
      <a href="#shorts">Artisan Stories</a>
      <a href="#stage">AI Studio</a>
      <a href="#footer">Sell on Craftify</a>
    </nav>

    <div class="ai-search d-none d-md-flex d-lg-none d-xl-flex">
      <i class="bi bi-search text-white-50 me-2"></i>
      <input type="text" placeholder="Search handwoven rugs, teak decor...">
      <span class="ai-chip"><i class="bi bi-stars"></i>AI</span>
    </div>
    <button class="icon-btn d-none d-lg-flex d-xl-none" aria-label="Search" id="navSearchToggle">
      <i class="bi bi-search"></i>
    </button>

    <div class="d-flex align-items-center gap-2 navbar-actions">
      <div class="lang-dd d-none d-sm-block" id="langDD">
        <button class="lang-toggle" id="langToggle" aria-haspopup="true" aria-expanded="false">
          <span class="flag">🇬🇧</span> EN <i class="bi bi-chevron-down" style="font-size:.7rem"></i>
        </button>
        <div class="lang-menu" role="menu">
          <button class="lang-item" data-lang="EN"><span class="flag">🇬🇧</span> English <span class="native">EN</span></button>
          <button class="lang-item" data-lang="BN"><span class="flag">🇧🇩</span> বাংলা <span class="native">Bengali</span></button>
          <button class="lang-item" data-lang="HI"><span class="flag">🇮🇳</span> हिन्दी <span class="native">Hindi</span></button>
          <button class="lang-item" data-lang="FR"><span class="flag">🇫🇷</span> Français <span class="native">French</span></button>
          <button class="lang-item" data-lang="ES"><span class="flag">🇪🇸</span> Español <span class="native">Spanish</span></button>
          <button class="lang-item" data-lang="AR"><span class="flag">🇸🇦</span> العربية <span class="native">Arabic</span></button>
        </div>
      </div>

      <button class="icon-btn theme-toggle" id="themeToggle" aria-label="Toggle dark mode">
        <i class="bi bi-moon-stars"></i>
        <i class="bi bi-sun"></i>
      </button>

      <button class="hamburger-btn" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileDrawer">
        <span class="h-line"></span>
        <span class="h-line"></span>
        <span class="h-line"></span>
      </button>

      <!-- FIXED: Duplicate Dropdown removed -->
      <div class="account-dd d-none d-lg-block" id="accountDD">
        <button class="icon-btn" id="accountToggle" aria-label="Account" aria-haspopup="true" aria-expanded="false">
          <i class="bi bi-person"></i>
        </button>

        <div class="account-menu" role="menu">
          @guest
          <div class="account-header">
            <div class="account-avatar"><i class="bi bi-person"></i></div>
            <div>
              <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#authModal" style="text-decoration: none; font-weight: bold; color: #0d6efd;">
                Login / Sign Up
              </a>
              <div class="email" style="font-size: 12px; color: gray;">Join Craftify</div>
            </div>
          </div>
          
          @endguest

          @auth
          <div class="account-header">
            <div class="account-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div>
              <div class="name" style="font-weight: bold; font-size: 14px;">{{ Auth::user()->name }}</div>
              <div class="email" style="font-size: 12px; color: gray;">{{ Auth::user()->email }}</div>
            </div>
          </div>
          <button class="account-item" role="menuitem" style="border: none; background: transparent; width: 100%; text-align: left; padding: 8px 15px;"><i class="bi bi-person-circle"></i> My Profile</button>
          <button class="account-item" role="menuitem" style="border: none; background: transparent; width: 100%; text-align: left; padding: 8px 15px;"><i class="bi bi-box-seam"></i> Orders</button>
          <button class="account-item" role="menuitem" style="border: none; background: transparent; width: 100%; text-align: left; padding: 8px 15px;"><i class="bi bi-heart"></i> Wishlist</button>
          <div class="account-divider"></div>
          <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="account-item danger" role="menuitem" style="border: none; background: transparent; width: 100%; text-align: left; padding: 8px 15px; color: red;">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
          @endauth
        </div>
      </div>

      <a href="#" class="icon-btn d-none d-lg-flex" aria-label="Cart">
        <i class="bi bi-bag"></i>
        <span class="cart-badge">3</span>
      </a>
    </div>
  </div>
</header>

<!-- ========================================== -->
<!-- PREMIUM AUTHENTICATION MODAL (POPUP) -->
<!-- ========================================== -->

<style>
  /* --- ANIMATIONS & COMPACT STYLING --- */
  @keyframes modalPopUp {
    0% {
      opacity: 0;
      transform: scale(0.95) translateY(20px);
    }

    100% {
      opacity: 1;
      transform: scale(1) translateY(0);
    }
  }

  @keyframes floatAnimation {
    0% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-8px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  .auth-modal-wrapper {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3);
    border: none;
    animation: modalPopUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .auth-left-panel {
    background: linear-gradient(135deg, #143126 0%, #235d47 100%);
    position: relative;
    overflow: hidden;
  }

  .auth-left-panel::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 60%);
    transform: rotate(30deg);
  }

  .floating-logo {
    animation: floatAnimation 3.5s ease-in-out infinite;
    max-height: 65px;
    object-fit: contain;
    filter: drop-shadow(0px 8px 12px rgba(0, 0, 0, 0.2));
  }

  /* Compact Tabs & Forms CSS */
  .auth-nav-tabs {
    background: #f1f5f9;
    border-radius: 8px;
    padding: 3px;
    border: none;
  }

  .auth-nav-tabs .nav-link {
    border-radius: 6px;
    color: #64748b;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    padding: 7px 12px;
    font-size: 14px;
  }

  .auth-nav-tabs .nav-link.active {
    background: #fff;
    color: #1b4332;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
  }

  .role-card {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    padding: 8px 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #fff;
  }

  .role-card:hover {
    border-color: #cbd5e1;
    transform: translateY(-1px);
  }

  .role-radio:checked+.role-card {
    border-color: #235d47;
    background: #f0fdf4;
  }

  .role-radio:checked+.role-card .role-icon {
    color: #235d47;
    transform: scale(1.05);
  }

  .role-icon {
    font-size: 18px;
    color: #94a3b8;
    transition: all 0.3s ease;
  }

  .input-group-custom {
    position: relative;
  }

  .input-group-custom .input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    z-index: 10;
    font-size: 15px;
  }

  .input-group-custom .toggle-password {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    z-index: 10;
    font-size: 15px;
    cursor: pointer;
    transition: color 0.3s;
  }

  .input-group-custom .toggle-password:hover {
    color: #235d47;
  }

  .input-group-custom .form-control {
    padding-left: 42px;
    padding-right: 42px;
    border-radius: 8px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    height: 42px;
    /* Height komano hoyeche */
    font-size: 13.5px;
    transition: all 0.3s;
  }

  .input-group-custom .form-control:focus {
    background: #fff;
    border-color: #235d47;
    box-shadow: 0 0 0 3px rgba(35, 93, 71, 0.12);
  }

  .btn-brand {
    background: linear-gradient(135deg, #143126 0%, #235d47 100%);
    border: none;
    color: white;
    height: 42px;
    /* Height komano hoyeche */
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
  }

  .btn-brand:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 12px -6px rgba(35, 93, 71, 0.6);
    color: white;
  }

  .btn-google-custom {
    background: #fff;
    border: 1px solid #e2e8f0;
    color: #475569;
    height: 42px;
    /* Height komano hoyeche */
    border-radius: 8px;
    font-weight: 600;
    font-size: 13.5px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .btn-google-custom:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
  }
</style>

<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content auth-modal-wrapper">
      <div class="row g-0">

        <!-- Left Banner (Hidden on Mobile) -->
        <div class="col-md-5 d-none d-md-flex flex-column align-items-center justify-content-center p-3 auth-left-panel">

          <div class="mb-3 text-center z-1">
            <img src="{{ asset('frontend/images/logo.png') }}" alt="Craftify Logo" class="img-fluid floating-logo" onerror="this.outerHTML='<h2 class=\'fw-bold text-white mb-0\'>Craftify</h2>'">
          </div>

          <div class="text-white text-center position-relative z-1">
            <p class="mb-3 text-white-50" style="font-size: 13px;">Join a global community of independent artisans and buyers.</p>

            <div class="d-flex flex-column gap-2 text-start mt-2" style="font-size: 13px;">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-shield-check fs-6" style="color: #fcd34d;"></i>
                <span class="fw-medium text-white opacity-75">Secure Payments</span>
              </div>
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-shop fs-6" style="color: #fcd34d;"></i>
                <span class="fw-medium text-white opacity-75">Unique Products</span>
              </div>
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-truck fs-6" style="color: #fcd34d;"></i>
                <span class="fw-medium text-white opacity-75">Fast Delivery</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Form Panel -->
        <div class="col-md-7 position-relative p-3 p-sm-4 bg-white">
          <button type="button" class="btn-close position-absolute top-0 end-0 m-3 shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

          <!-- Welcome Header Above Tabs -->
          <div class="text-center mb-3">
            <h5 class="fw-bold text-dark mb-1">Welcome to Craftify ✨</h5>
            <p class="text-muted mb-0" style="font-size: 12px;">Your creative journey starts here.</p>
          </div>

          <!-- Modern Tabs -->
          <ul class="nav nav-pills d-flex mb-3 auth-nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item flex-fill text-center" role="presentation">
              <button class="nav-link w-100 active" data-bs-toggle="pill" data-bs-target="#pills-login" type="button">Log In</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
              <button class="nav-link w-100" data-bs-toggle="pill" data-bs-target="#pills-register" type="button">Sign Up</button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">

            <!-- ===================== LOGIN FORM ===================== -->
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
              <form action="{{ route('auth.login.submit') }}" method="POST">
                @csrf

                <div class="d-flex gap-2 mb-3 text-center">
                  <label class="flex-fill">
                    <input type="radio" name="login_role" value="customer" class="d-none role-radio" checked>
                    <div class="role-card shadow-sm">
                      <i class="bi bi-person-heart role-icon d-block mb-1"></i>
                      <small class="fw-bold text-dark" style="font-size: 12px;">Customer</small>
                    </div>
                  </label>
                  <label class="flex-fill">
                    <input type="radio" name="login_role" value="vendor" class="d-none role-radio">
                    <div class="role-card shadow-sm">
                      <i class="bi bi-shop-window role-icon d-block mb-1"></i>
                      <small class="fw-bold text-dark" style="font-size: 12px;">Vendor</small>
                    </div>
                  </label>
                </div>

                <div class="mb-2 input-group-custom">
                  <i class="bi bi-envelope input-icon"></i>
                  <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>

                <div class="mb-2 input-group-custom">
                  <i class="bi bi-lock input-icon"></i>
                  <input type="password" name="password" class="form-control" placeholder="Password" id="loginPassword" required>
                  <i class="bi bi-eye toggle-password" onclick="togglePasswordVisibility('loginPassword', this)"></i>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label text-muted mt-1" for="rememberMe" style="cursor: pointer; font-size: 12px;">Remember me</label>
                  </div>
                  <a href="#" class="text-decoration-none fw-bold" style="color: #235d47; font-size: 12px;">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-brand w-100 mb-2"><i class="bi bi-box-arrow-in-right me-2"></i>Sign In</button>

                <div class="position-relative text-center my-2">
                  <hr class="text-muted opacity-25">
                  <span class="position-absolute top-50 start-50 translate-middle bg-white px-2 text-muted" style="font-size: 11px; font-weight: 500;">OR</span>
                </div>

                <button type="button" class="btn btn-google-custom w-100">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" width="16" class="me-2"> Continue with Google
                </button>
              </form>
            </div>

            <!-- ===================== REGISTER FORM ===================== -->
            <div class="tab-pane fade" id="pills-register" role="tabpanel">
              <form action="{{ route('auth.register.submit') }}" method="POST">
                @csrf

                <div class="d-flex gap-2 mb-2 text-center">
                  <label class="flex-fill">
                    <input type="radio" name="register_role" value="customer" class="d-none role-radio" checked>
                    <div class="role-card shadow-sm py-1">
                      <i class="bi bi-person-heart role-icon d-block mb-1"></i>
                      <small class="fw-bold text-dark" style="font-size: 12px;">Customer</small>
                    </div>
                  </label>
                  <label class="flex-fill">
                    <input type="radio" name="register_role" value="vendor" class="d-none role-radio">
                    <div class="role-card shadow-sm py-1">
                      <i class="bi bi-shop-window role-icon d-block mb-1"></i>
                      <small class="fw-bold text-dark" style="font-size: 12px;">Vendor</small>
                    </div>
                  </label>
                </div>

                <div class="mb-2 input-group-custom">
                  <i class="bi bi-person input-icon"></i>
                  <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="mb-2 input-group-custom">
                  <i class="bi bi-envelope input-icon"></i>
                  <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>

                <div class="row g-2 mb-3">
                  <div class="col-6 input-group-custom">
                    <i class="bi bi-lock input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="regPassword" required>
                    <i class="bi bi-eye toggle-password" onclick="togglePasswordVisibility('regPassword', this)"></i>
                  </div>
                  <div class="col-6 input-group-custom">
                    <i class="bi bi-shield-lock input-icon"></i>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm" id="regConfirmPassword" required>
                    <i class="bi bi-eye toggle-password" onclick="togglePasswordVisibility('regConfirmPassword', this)"></i>
                  </div>
                </div>

                <button type="submit" class="btn btn-brand w-100 shadow-sm mb-2"><i class="bi bi-person-plus me-2"></i>Create Account</button>

                <div class="position-relative text-center my-2">
                  <hr class="text-muted opacity-25">
                  <span class="position-absolute top-50 start-50 translate-middle bg-white px-2 text-muted" style="font-size: 11px; font-weight: 500;">OR</span>
                </div>

                <button type="button" class="btn btn-google-custom w-100 mb-1">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" width="16" class="me-2"> Sign up with Google
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function togglePasswordVisibility(inputId, iconElement) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
      input.type = "text";
      iconElement.classList.remove("bi-eye");
      iconElement.classList.add("bi-eye-slash");
    } else {
      input.type = "password";
      iconElement.classList.remove("bi-eye-slash");
      iconElement.classList.add("bi-eye");
    }
  }
</script>
<!-- END MODAL -->

@if($errors->any())
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Form er nicher dike error message show korbe
    var authModal = new bootstrap.Modal(document.getElementById('authModal'));
    authModal.show();
  });
</script>
@endif