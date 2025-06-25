<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <style>
      :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #f59e0b;
        --dark: #1e293b;
        --light: #f8fafc;
        --gray: #94a3b8;
        --success: #10b981;
        --error: #ef4444;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }

      body {
        background-color: var(--light);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
      }

      .login-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
        width: 100%;
        max-width: 400px;
        padding: 40px 30px;
      }

      .login-header {
        text-align: center;
        margin-bottom: 30px;
      }

      .login-header h1 {
        color: var(--dark);
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
      }

      .login-header p {
        color: var(--gray);
        font-size: 14px;
      }

      .login-form .form-group {
        margin-bottom: 20px;
      }

      .login-form label {
        display: block;
        color: var(--dark);
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
      }

      .login-form input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--gray);
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease;
      }

      .login-form input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      }

      .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        font-size: 14px;
      }

      .remember-me {
        display: flex;
        align-items: center;
      }

      .remember-me input {
        width: auto;
        margin-right: 8px;
      }

      .forgot-password a {
        color: var(--primary);
        text-decoration: none;
      }

      .forgot-password a:hover {
        text-decoration: underline;
      }

      .login-button {
        width: 100%;
        padding: 12px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .login-button:hover {
        background-color: var(--primary-dark);
      }

      .divider {
        display: flex;
        align-items: center;
        margin: 25px 0;
        color: var(--gray);
        font-size: 14px;
      }

      .divider::before,
      .divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid var(--gray);
      }

      .divider::before {
        margin-right: 10px;
      }

      .divider::after {
        margin-left: 10px;
      }

      .social-login {
        display: flex;
        flex-direction: column;
        gap: 12px;
      }

      .social-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border: 1px solid var(--gray);
        border-radius: 6px;
        background-color: white;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .social-button:hover {
        background-color: #f8fafc;
      }

      .social-button img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
      }

      .register-link {
        text-align: center;
        margin-top: 25px;
        font-size: 14px;
        color: var(--gray);
      }

      .register-link a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
      }

      .register-link a:hover {
        text-decoration: underline;
      }

      @media (max-width: 480px) {
        .login-container {
          padding: 30px 20px;
        }

        .login-header h1 {
          font-size: 22px;
        }

        .remember-forgot {
          flex-direction: column;
          align-items: flex-start;
          gap: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <div class="login-header">
        <h1>🔐 Welcome Back</h1>
        <p>Please enter your details to sign in</p>
      </div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form method="POST" action="{{ route('login.post') }}" class="login-form">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required />
        @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
        @error('password')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="remember-forgot">
        <div class="remember-me">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
            <label for="remember">Remember me</label>
        </div>
        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>
    </div>

    <button type="submit" class="login-button">Sign In</button>

    <div class="divider">or</div>

    <div class="register-link">
        Don't have an account? <a href="{{ route('register') }}">Sign up</a>
    </div>
</form>

<!-- Add this for the alert animation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Auto-dismiss alert after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
        
        // Manual dismiss
        $('.close').click(function() {
            $(this).parent().fadeOut('slow');
        });
    });
</script>
    </div>
  </body>
</html>
